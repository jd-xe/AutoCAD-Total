<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\BrochureController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentUploadController;
use App\Http\Controllers\Student\Auth\ChangePasswordController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\EnrollmentController as StudentEnrollmentController;
use App\Http\Controllers\Student\PaymentController as StudentPaymentController;
use App\Http\Controllers\Student\ReceiptController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/nosotros', function () {
    return view('home.partials.nosotros');
})->name('nosotros');

Route::get('/eventos', function () {
    return view('home.partials.experiencia.eventos');
})->name('eventos');

Route::get('/comunidad', function () {
    return view('home.partials.experiencia.comunidad');
})->name('comunidad');

Route::get('/pagos', [PaymentController::class, 'index'])->name('pagos');

Route::get('/contacto', [ContactController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'send'])->name('contacto.send');

Route::get('/certificados', function () {
    return view('home.partials.certificados');
})->name('certificados');

Route::get('/inventor-basico', function() {
    return view('courses.inventor_basic');
})->name('inventor.basic');

Route::get('/inventor-avanzado', function() {
    return view('courses.inventor_advanced');
})->name('inventor.advanced');

Route::get('/solidworks-avanzado', function() {
    return view('courses.solidworks_advanced');
})->name('solidworks.advanced');

Route::get('/solidworks-basico', function() {
    return view('courses.solidworks_basic');
})->name('solidworks.basic');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('/confirm-email', [EmailVerificationController::class, 'verify'])->name('email.verify');

Route::get('/registro/pago/{token}', [PaymentUploadController::class, 'showForm'])->name('payment.upload.form');
Route::post('/registro/pago/{token}', [PaymentUploadController::class, 'submitForm'])->name('payment.upload.submit');

Route::middleware('auth:web')->group(function () {
    Route::prefix('student')
        ->middleware('role:student')
        ->name('student.')
        ->group(function () {
            Route::get('/dashboard', StudentDashboardController::class)->name('dashboard');

            # Cursos
            Route::get('courses', [CourseController::class, 'index'])->name('courses');

            #Notas
            Route::get('grades', [\App\Http\Controllers\Student\GradeController::class, 'index'])
                ->name('grades.index');

            # Pagos
            Route::get('payments', [StudentPaymentController::class, 'index'])->name('payments');
            Route::get('payments/{concept}/upload', [StudentPaymentController::class, 'create'])->name('payments.upload');
            Route::post('payments/upload', [StudentPaymentController::class, 'store'])->name('payments.store');

            # Matrículas
            Route::get('enrollments', [StudentEnrollmentController::class, 'index'])->name('enrollments');
            Route::post('enrollments/select-group', [StudentEnrollmentController::class, 'store'])->name('enrollments.store');

            # Documentos
            Route::get('documents', [\App\Http\Controllers\Student\DocumentController::class, 'index'])
                ->name('documents');

            # Perfil
            Route::get('profile', [\App\Http\Controllers\Student\ProfileController::class, 'edit'])
                ->name('profile.edit');
            Route::post('profile', [\App\Http\Controllers\Student\ProfileController::class, 'update'])
                ->name('profile.update');

            Route::get('profile/password', [ChangePasswordController::class, 'edit'])
                ->name('profile.password.edit');
            Route::post('profile/password', [ChangePasswordController::class, 'update'])
                ->name('profile.password.update');
        });

    Route::prefix('admin')
        ->middleware('role:admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

            # Pagos
            Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments');
            Route::post('/payments/{payment}/approve', [AdminPaymentController::class, 'approvePayment'])->name('payments.approve');
            Route::post('/payments/{payment}/reject', [AdminPaymentController::class, 'rejectPayment'])->name('payments.reject');

            # Cursos
            Route::get('courses', [\App\Http\Controllers\Admin\CourseController::class, 'index'])
                ->name('courses.index');

            # Grupos
            Route::get('groups', [\App\Http\Controllers\Admin\CourseGroupController::class, 'index'])
                ->name('groups.index');
            Route::get('groups/{group}/students', [\App\Http\Controllers\Admin\GroupStudentController::class, 'index'])
                ->name('groups.students');

            Route::post(
                'groups/{group}/move-student/{user}',
                [\App\Http\Controllers\Admin\GroupStudentController::class, 'move']
            )->name('groups.move-student');

            # Horarios
            Route::get('schedules', [\App\Http\Controllers\Admin\ScheduleController::class, 'index'])
                ->name('schedules.index');

            # Recursos
            Route::get('resources', [\App\Http\Controllers\Admin\ResourceController::class, 'index'])
                ->name('resources.index');

            # Reportes
            Route::get('reports/enrollments', [ReportController::class, 'enrollments'])
                ->name('reports.enrollments');

            # Matrículas
            Route::resource('enrollments', \App\Http\Controllers\Admin\EnrollmentController::class)
                ->only(['index', 'show', 'update']);

            # Conceptos de pago
            Route::resource('payment_concepts', \App\Http\Controllers\Admin\PaymentConceptController::class)
                ->except(['show']);

            # Métodos de pago
            Route::resource('payment_methods', \App\Http\Controllers\Admin\PaymentMethodController::class)
                ->except(['show']);

            # Usuarios
            Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])
                ->name('users.index');
        });

    // Route::prefix('teacher')
    //     ->middleware('role:teacher')
    //     ->group(function () {
    //         Route::get('/dashboard', [TeacherDashboardController::class, 'index'])
    //             ->name('teacher.dashboard');
    //     });
});

Route::prefix('certificates')->group(function () {
    // Generar certificado
    Route::post('/generate', [CertificateController::class, 'store'])->name('certificates.generate');

    // Validar certificado público (QR apunta a esta)
    Route::get('/validate/{code}', [CertificateController::class, 'validateCertificate'])->name('certificates.validate');
    
    Route::get('/validate-dni', [CertificateController::class, 'validateByDni'])
    ->name('certificates.validateByDni');

});

Route::view('/certificates/test', 'certificates.test');

Route::get('/create-password', [NewPasswordController::class, 'showCreatePasswordForm'])
    ->name('password.reset.form');

Route::post('/create-password', [NewPasswordController::class, 'storeNewPassword'])
    ->name('password.reset.store');
    
Route::get('/curso-basico', function () {
    return view('courses.basic');
})->name('curso.basico');

Route::get('/curso-intermedio', function () {
    return view('courses.intermediate');
})->name('curso.intermedio');

Route::get('/curso-avanzado', function () {
    return view('courses.advanced');
})->name('curso.avanzado');

Route::get('/brochure/{nivel}/download', [BrochureController::class, 'download'])
    ->name('brochure.download');

require __DIR__ . '/auth.php';
