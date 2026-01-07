<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\PaymentConcept;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Servicio de dominio para gestionar pagos en la plataforma de cursos online.
 */
class PaymentService
{
    private $enrollmentService;
    private $passwordResetService;
    /**
     * Constructor del servicio
     */
    public function __construct(EnrollmentService $enrollmentService, PasswordResetService $passwordResetService)
    {
        $this->enrollmentService = $enrollmentService;
        $this->passwordResetService = $passwordResetService;
    }

    /**
     * Obtiene los pagos más recientes.
     *
     * @param int $count Número de registros a devolver.
     * @return Collection
     */
    public function latest(int $count = 5): Collection
    {
        return Payment::with(['user', 'concept'])
            ->orderByDesc('created_at')
            ->limit($count)
            ->get();
    }

    /**
     * Obtiene los pagos asociados a un estudiante.
     *
     * @param int $studentId ID del usuario/estudiante.
     * @param int $count Opcional: limite de registros.
     * @return Collection
     */
    public function forStudent(int $studentId, int $count = 10): Collection
    {
        return Payment::with('concept')
            ->where('user_id', $studentId)
            ->orderByDesc('created_at')
            ->limit($count)
            ->get();
    }

    /**
     * Lista y filtra pagos con paginación.
     *
     * @param array $filters   Filtros (status, course_id, date_from, date_to).
     * @param int   $perPage   Registros por página.
     * @return LengthAwarePaginator
     */
    public function paginate(array $filters = [], int $perPage = 20): LengthAwarePaginator
    {
        $query = Payment::with(['user', 'concept']);

        if (!empty($filters['type'])) {
            $query->whereHas('concept', fn($q) => $q->where('type', $filters['type']));
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['date_from'])) {
            $query->whereDate('created_at', '>=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $query->whereDate('created_at', '<=', $filters['date_to']);
        }

        $query->orderByDesc('created_at');
        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Busca un pago por su ID.
     *
     * @param int $id
     * @return Payment|null
     */
    public function find(int $id): ?Payment
    {
        return Payment::with(['user', 'concept'])
            ->findOrFail($id);
        #            ->first();
    }

    /**
     * Crea un nuevo pago.
     *
     * @param array $data
     * @return Payment
     */
    public function create(array $data): Payment
    {
        return Payment::create($data);
    }

    /**
     * Actualiza un pago existente.
     *
     * @param int   $id
     * @param array $data
     * @return Payment
     */
    public function update(int $id, array $data): Payment
    {
        $payment = $this->find($id);
        if ($payment) {
            $payment->update($data);
        }
        return $payment;
    }

    /**
     * Aprueba un pago (ej. cambiar status a 'approved').
     *
     * @param int $id
     * @return Payment|null
     */
    public function approve(int $id): ?Payment
    {
        Log::info("Buscando pago con ID: {$id}");
        $payment = $this->find($id);
        Log::info("Pago encontrado: " . ($payment ? "Sí, con ID => $payment->id" : 'No'));
        $this->validateForApprovalOrRejection($payment);

        if ($payment) {
            $payment->status = 'approved';
            $payment->uploaded_at = now();
            $payment->save();
            Log::info("Pago aprobado correctamente. ID: {$payment->id}, Usuario: {$payment->user_id}");
        }
        return $payment;
    }

    /**
     * Rechaza un pago (cambia status a 'rejected').
     *
     * @param int $id
     * @return Payment|null
     */
    public function reject(int $id): ?Payment
    {
        $payment = $this->find($id);
        $this->validateForApprovalOrRejection($payment);

        if ($payment) {
            $payment->status = 'rejected';
            $payment->save();
        }
        return $payment;
    }

    public function approvePaymentAndHandleEnrollment(int $paymentId)
    {
        DB::beginTransaction();

        try {
            $payment = $this->approve($paymentId);

            if ($payment->concept->type === 'enrollment') {
                Log::info("El concepto del pago es inscripción. Creando matrícula...");
                $this->enrollmentService->createFromPayment($payment);
                Log::info("Enviando enlace de restablecimiento de contraseña a: " . $payment->user->email);
                $this->passwordResetService->sendPasswordResetLink($payment->user);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Fallo durante la aprobación del pago: " . $th->getMessage());
            throw new \InvalidArgumentException($th->getMessage());
        }
    }

    /**
     * Valida si el pago existe o está en estado de verificación.
     *
     * @param Payment $payment
     * @return bool
     */
    private function validateForApprovalOrRejection(Payment $payment): void
    {
        if (!$payment) {
            Log::warning("Pago no encontrado para validación.");
            throw new \InvalidArgumentException("Pago no encontrado.");
        }
        if ($payment->status !== 'verification') {
            Log::warning("Pago ID {$payment->id} con estado inválido para aprobación: {$payment->status}");
            throw new \InvalidArgumentException("Este pago no está en estado de verificación.");
        }
        Log::info("Pago ID {$payment->id} validado correctamente para aprobación.");
    }


    /**
     * Obtiene pagos en un rango de fechas.
     *
     * @param string $start
     * @param string $end
     * @return Collection
     */
    public function forDateRange(string $start, string $end): Collection
    {
        return Payment::with(['user', 'concept'])
            ->whereBetween('created_at', [Carbon::parse($start), Carbon::parse($end)])
            ->orderByDesc('created_at')
            ->get();
    }

    public function getAvailableConceptsFor($user)
    {
        $hasActiveEnrollment = $user->enrollments()->where('status', 'active')->exists();
        $hasIncompleteEnrollment = $user->enrollments()->where('status', 'incomplete')->exists();

        return PaymentConcept::where(function ($query) use ($hasActiveEnrollment, $hasIncompleteEnrollment) {
            $query->when($hasIncompleteEnrollment, function ($q) {
                // Solo permitir matrícula inicial
                $q->where('type', 'enrollment');
            })->when(!$hasIncompleteEnrollment && !$hasActiveEnrollment, function ($q) {
                // Primer pago posible: matrícula básica
                $q->where('type', 'enrollment');
            })->when($hasActiveEnrollment, function ($q) {
                // Permitir documentos si el ciclo ya está iniciado
                $q->where('type', 'document');
            });
        })->get();
    }

    public function createPaymentFor($user, PaymentConcept $concept, int $paymentMethodId): Payment
    {
        return Payment::create([
            'user_id'            => $user->id,
            'concept_id'         => $concept->id,
            'payment_method_id'  => $paymentMethodId,
            'amount'             => $concept->amount,
            'status'             => 'pending',
        ]);
    }

    /**
     * Genera un reporte agregado por curso o por estudiante.
     *
     * @param array $options ['group_by' => 'course'|'student', 'date_from', 'date_to']
     * @return array
     */
    /*public function generateReport(array $options = []): array
    {
        $query = Payment::selectRaw(
            ($options['group_by'] === 'student' ? 'user_id' : 'course_id') . ', COUNT(*) as total, SUM(amount) as revenue'
        );

        if (!empty($options['date_from'])) {
            $query->where('created_at', '>=', Carbon::parse($options['date_from']));
        }
        if (!empty($options['date_to'])) {
            $query->where('created_at', '<=', Carbon::parse($options['date_to']));
        }

        $groupCol = $options['group_by'] === 'student' ? 'user_id' : 'course_id';
        $results = $query->groupBy($groupCol)->get();

        return $results->mapWithKeys(function ($item) use ($groupCol) {
            return [$item->$groupCol => [
                'count'   => $item->total,
                'revenue' => $item->revenue,
            ]];
        })->toArray();
    }*/
}
