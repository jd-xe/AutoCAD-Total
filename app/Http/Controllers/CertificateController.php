<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use App\Models\CourseGroup;
use setasign\Fpdi\Tcpdf\Fpdi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Genera un certificado PDF a partir de una plantilla PDF.
     * Inserta nombre, curso, fecha, y coloca un QR que apunta a la URL de validación.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_group_id' => 'required|exists:course_groups,id',
            'enrollment_id' => 'nullable|exists:enrollments,id',
        ]);

        $user = User::findOrFail($data['user_id']);
        $courseGroup = CourseGroup::with('course')->findOrFail($data['course_group_id']);

        // Crear registro del documento (boot() del modelo genera validation_code)
        $document = Document::create([
            'user_id' => $user->id,
            'course_group_id' => $courseGroup->id,
            'enrollment_id' => $data['enrollment_id'] ?? null,
            'type' => 'certificate',
            'status' => 'issued',
            'document_url' => '',
        ]);

        // URL pública de validación
        $validationUrl = route('certificates.validate', $document->validation_code);

        // Generar QR como PNG (binario)
        $qrBinary = QrCode::format('png')->size(300)->generate($validationUrl);

        // Rutas
        $templatePath = storage_path('app/private/templates/certificate_template.pdf');
        if (!file_exists($templatePath)) {
            abort(500, "Plantilla PDF no encontrada: {$templatePath}");
        }

        $userId = $document->user_id;
        $outDir = storage_path('app/public/certificates');
        $outDir = $outDir . "/user_{$userId}";
        if (!is_dir($outDir)) mkdir($outDir, 0755, true);

        $outfile = $outDir . '/document_' . $document->id . '.pdf';

        $customFontPath = storage_path('app/private/fonts/');
        
        // --- Generar PDF con FPDI (TCPDF wrapper) ---
        $pdf = new Fpdi();
        
        $pdf->AddFont('greatvibes', '', $customFontPath . 'greatvibes.php');
        $pdf->AddFont('Kelvinchb', '', $customFontPath . 'Kelvinchb.php');

        // Opciones útiles
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(false);
        $pdf->setMargins(0, 0, 0);

        // Cargar plantilla y obtener tamaño
        $pageCount = $pdf->setSourceFile($templatePath);
        $tplId = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tplId);

        // Añadir página con las dimensiones exactas de la plantilla
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($tplId, 0, 0, $size['width'], $size['height']);

        // Fuente UTF-8 (dejavusans incluida en TCPDF, soporta tildes)
        $pdf->SetFont('dejavusans', '', 20);
        $pdf->SetFontSubsetting(false);
        $pdf->SetTextColor(0, 0, 0);

        // ======= Posiciones: ajustar según tu plantilla =======
        $fontName = 'times';       // o 'greatvibes' si ya cargaste la fuente correctamente
        $fontCourse = 'Kelvinchb';
        $fontDate = 'dejavusans';
        
        // --- Posiciones (en mm) ---
        $nameY   = 90;  // Altura del nombre: AJUSTABLE
        $courseX = 69;  $courseY = 126.5;
        $dateX   = 170;  $dateY   = 137.6;
        
        // --- QR abajo a la derecha ---
        $qrW = 30; // ancho en mm
        $qrH = 30;
        $qrMargin = 15; // margen desde los bordes
        #$qrX = $size['width'] - $qrW - $qrMargin;
        $qrX = $qrMargin;
        $qrY = $qrH - $qrMargin;
        #$qrY = $size['height'] - $qrH - $qrMargin;
        
        // ======= CENTRAR NOMBRE =======
        $pdf->SetFont($fontName, 'BI', 44); 
        $pdf->SetTextColor(50, 50, 50);
        $studentName = mb_strtoupper($user->first_name . ' ' . $user->last_name);
        
        // Calcular ancho del texto (en mm)
        $nameWidth = $pdf->GetStringWidth($studentName);
        
        // Calcular posición X centrada
        $nameX = ($size['width'] - $nameWidth) / 2;
        
        // Escribir nombre centrado
        $pdf->SetXY($nameX, $nameY);
        $pdf->Write(0, $studentName);
        
        // ======= CURSO =======
        $pdf->SetFont($fontCourse, '', 22);
        $pdf->SetXY($courseX, $courseY);
        $courseName = $courseGroup->course->name ?? 'Curso';
        if (str_starts_with($courseName, 'AutoCAD ')) {
            $courseName = substr($courseName, 8); // 'AutoCAD ' tiene 8 caracteres
        }
        $pdf->Write(0, $courseName);
        
        // ======= FECHA =======
        $pdf->SetFont($fontDate, '', 18);
        $pdf->SetXY($dateX, $dateY);
        $pdf->Write(0, now()->format('d/m/Y'));
        
        // ======= QR =======
        $pdf->Image('@' . $qrBinary, $qrX, $qrY, $qrW, $qrH, 'PNG');

        // Guardar en disco (Output con 'F')
        $pdf->Output($outfile, 'F');

        // Actualizar ruta en la BD (ruta relativa a storage/app/public)
        $document->update(['document_url' => 'certificates/' . $document->id . '.pdf']);

        // Retornar descarga o URL
        return response()->download($outfile);
    }

    /**
     * Validar certificado público
     */
    public function validateCertificate0($code)
    {
        $document = Document::where('validation_code', $code)->first();

        if (! $document) {
            return view('certificates.invalid');
        }

        // (Opcional) marcar como verificado:
        // if ($document->status !== 'verified') {
        //     $document->update(['status' => 'verified']);
        // }

        return view('certificates.valid', [
            'document' => $document,
            'user' => $document->user,
            'course' => $document->courseGroup->course ?? null,
        ]);
    }
    
    public function validateCertificate(Request $request)
    {
        $dni = $request->input('dni');
    
        if (! $dni) {
            return view('certificates.invalid');
        }
    
        // Buscar usuario por DNI
        $user = User::where('dni', $dni)->first();
    
        if (! $user) {
            return view('certificates.invalid', [
                'message' => 'No se encontró ningún estudiante con ese DNI.'
            ]);
        }
    
        // Buscar todos los documentos emitidos para ese usuario
        $documents = Document::with('courseGroup.course')
            ->where('user_id', $user->id)
            ->where('status', 'issued') // opcional
            ->get();
    
        if ($documents->isEmpty()) {
            return view('certificates.invalid', [
                'message' => 'No hay certificados emitidos para este DNI.'
            ]);
        }
    
        return view('certificates.list', [
            'user' => $user,
            'documents' => $documents,
        ]);
    }
    
}
