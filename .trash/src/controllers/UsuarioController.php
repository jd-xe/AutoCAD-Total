<?php

namespace Jd\Amisam\Controllers;

use Jd\Amisam\Core\View;
use Jd\Amisam\Helpers\ExcelHelper;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Models\User;
use Jd\Amisam\Services\MailService;

class UsuarioController
{
    private $userModel;
    private $mailService;
    private $pago;
    private $error;

    public function __construct()
    {
        $this->userModel = new User();
        $this->mailService = new MailService();
        $this->pago = new Pago();
        $this->error = new ErrorController();
    }

    public function getUserById($id)
    {
        try {
            $usuario = $this->userModel->getUserById($id);
            echo json_encode($usuario);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $errorController->methodNotAllowed();
            return;
        }
        
        $requiredFields = ['name', 'apaterno', 'amaterno', 'dni', 'emailRegister', 'celular', 'direccion', 'fnacimiento'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $errorController->badRequest("El campo '$field' es obligatorio.");
                return;
            }
        }
        
        try {
             $token = bin2hex(random_bytes(32));
        $passwordPlano = bin2hex(random_bytes(4));

        $userData = [
            'nombres' => htmlspecialchars($_POST['name']),
            'apellidos' => htmlspecialchars($_POST['apaterno'] . ' ' . $_POST['amaterno']),
            'dni' => htmlspecialchars($_POST['dni']),
            'username' => htmlspecialchars(strtolower($_POST['dni'])),
            'email' => htmlspecialchars($_POST['emailRegister']),
            'password' => password_hash($passwordPlano, PASSWORD_DEFAULT),
            'telefono' => htmlspecialchars($_POST['celular']),
            'token_confirmacion' => $token,
        ];

        $profileData = [
            'direccion' => htmlspecialchars($_POST['direccion']),
            'fecha_nacimiento' => htmlspecialchars($_POST['fnacimiento']),
        ];
        
        $userId  = $this->userModel->createUser($userData, $profileData);

        if (!$userId) {
            error_log("Error al registrar usuario: " . json_encode($userData));
            $this->error->internalServerError("Hubo un problema al registrar tu cuenta. Inténtalo de nuevo.");
            return;
        }
        
        $variables = [
            'nombres' => $userData['nombres'],
            'apellidos' => $userData['apellidos'],
            'link_confirmacion' => "https://autocadtotal.com/usuario/confirmar?token=$token",
        ];
        
        #if (!$this->mailService->sendEmail(
         #   $userData['email'],
          #  "Confirmación de registro en AMISAM - Cursos de AutoCAD",
           # "confirmation",
            #$variables
        #)) {
         #   error_log("Error al enviar email a: " . $userData['email']);
        #}
        
        $emailEnviado = $this->mailService->sendEmail(
                $userData['email'],
                "Confirmación de registro en AMISAM - Cursos de AutoCAD",
                "confirmation",
                $variables
            );
            
            if (!$emailEnviado) {
                error_log("Error al enviar email a: " . $userData['email']);
                View::render('usuarios/registro_exitoso', [
                    'title' => 'Registro Exitoso',
                    'message' => 'Tu cuenta ha sido creada con éxito, pero no pudimos enviarte el correo de confirmación. 
                              Puedes intentar reenviarlo o contactar con soporte.',
                    'class' => 'text-warning',
                    'showResendOption' => true,
                    'email' => $userData['email']
                ]);
                return;
            }
        
        View::render('usuarios/registro_exitoso', [
                'title' => 'Registro Exitoso',
                'message' => 'Tu cuenta ha sido creada con éxito. Revisa tu correo para confirmar tu cuenta.',
                'class' => 'text-success'
            ]);    
            
        } catch (\Exception $e) {
            error_log("Error en el proceso de registro: " . $e->getMessage());
            $errorController->internalServerError("Ocurrió un error inesperado. Inténtalo más tarde.");
        }
    }
    
    public function reenviarConfirmacion()
    {
        $errorController = new ErrorController();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $errorController->methodNotAllowed();
            return;
        }

        if (empty($_POST['email'])) {
            $errorController->badRequest("El email es obligatorio.");
            return;
        }

        $email = htmlspecialchars($_POST['email']);

        // Buscar al usuario por su email
        $usuario = $this->userModel->findByEmail($email);

        if (!$usuario) {
            $errorController->notFound("No se encontró un usuario con ese email.");
            return;
        }

        // Verificar si ya confirmó su cuenta
        if ($usuario['estado'] === 'confirmado') {
            View::render('usuarios/registro_exitoso', [
                'title' => 'Cuenta ya confirmada',
                'message' => 'Tu cuenta ya ha sido confirmada. Puedes iniciar sesión.',
                'class' => 'text-info'
            ]);
            return;
        }

        // Variables para el correo
        $variables = [
            'nombres' => $usuario['nombres'],
            'apellidos' => $usuario['apellidos'],
            'link_confirmacion' => "http://amisam.test/usuario/confirmar?token=" . $usuario['token_confirmacion'],
        ];

        // Intentar enviar el correo nuevamente
        if (!$this->mailService->sendEmail(
            $usuario['email'],
            "Reenvío: Confirmación de registro en AMISAM - Cursos de AutoCAD",
            "confirmation",
            $variables
        )) {
            error_log("Error al reenviar email a: " . $usuario['email']);
            View::render('usuarios/registro_exitoso', [
                'title' => 'Error al reenviar',
                'message' => 'No pudimos enviarte el correo de confirmación. Inténtalo más tarde o contacta con soporte.',
                'class' => 'text-danger'
            ]);
            return;
        }

        // Si todo fue exitoso
        View::render('usuarios/registro_exitoso', [
            'title' => 'Correo reenviado',
            'message' => 'Hemos reenviado el correo de confirmación. Revisa tu bandeja de entrada.',
            'class' => 'text-success'
        ]);
    }

    public function downloadExcel()
    {
        try {
            $usuarios = $this->userModel->getAllActiveUsers();

            if (empty($usuarios)) {
                (new ErrorController())->notFound();
                return;
            }

            $excelHelper = new ExcelHelper();
            $excelHelper->generateExcel($usuarios, 'Usuarios Activos');
        } catch (\Exception $e) {
            error_log("Error al generar el archivo excel: " . $e->getMessage());
            (new ErrorController())->internalServerError();
        }
    }

    public function eliminar($id)
    {
        # Falta el método REQUEST, definir si será GET o DELETE
        if ($this->userModel->deleteUser($id)) {
            echo "Usuario eliminado exitosamente";
        } else {
            echo "Error al eliminado usuario.";
        }
    }

    public function restaurar($id)
    {
        if ($this->userModel->restoreUser($id)) {
            echo "Usuario restaurado correctamente.";
        } else {
            echo "Error al restaurar usuario.";
        }
    }

    public function actualizar($id)
    {
        $userData = [
            'nombres' => $_POST['nombres'],
            'apellidos' => $_POST['apellidos'],
            'dni' => $_POST['dni'],
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'telefono' => $_POST['telefono']
        ];

        if ($this->userModel->updateUser($id, $userData)) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Error al actualizar usuario.";
        }
    }

    public function confirmar()
    {
        if (!isset($_GET['token']) || empty($_GET['token'])) {
            (new ErrorController())->badRequest('No se ha proporcionado un token de confirmación.');
            return;
        }

        $token = htmlspecialchars($_GET['token'], ENT_QUOTES, 'UTF-8');
        $usuario = $this->userModel->getUserByToken($token);

        if (!$usuario) {
            error_log("Intento de confirmación con token inválido: $token");
            (new ErrorController())->notFound('El enlace de confirmación no es válido o ya ha sido usado.');
            return;
        }

        try {
            $this->userModel->confirmUser($usuario['usuario_id']);
            #error_log("Usuario confirmado: " . $usuario['usuario_id']);

            $concepto_id = 1;
            $metodo_pago_id = 1;
            $token_pago = $this->pago->crearPago($usuario['usuario_id'], $concepto_id, $metodo_pago_id);

            if (!$token_pago) {
                error_log("Error al crear el pago para usuario_id: " . $usuario['usuario_id']);
                throw new \Exception("No se pudo registrar el pago pendiente");
            }

            error_log("Pago creado con éxito. Token: $token_pago");
            $urlPago = BASE_URL . "/pago/subirComprobante?token=$token_pago";

            $variablesPago = [
                'nombres' => $usuario['nombres'] . " " . $usuario['apellidos'],
                'monto' => '200.00',
                'url_subir_comprobante' => $urlPago,
                'whatsapp_contacto' => '+51 913318947'
            ];

            if (!$this->mailService->sendEmail(
                $usuario['email'],
                "Pago de Matrícula - Completa tu Inscripción",
                "payment_request",
                $variablesPago
            )) {
                error_log("Error al enviar email de pago a: " . $usuario['email']);
                (new ErrorController())->internalServerError('Tu cuenta ha sido confirmada, pero tuvimos problemas enviándote el correo. Contáctanos para más detalles.');
                return;
            } else {
                error_log("Correo de pago enviado correctamente a: " . $usuario['email']);
            }

            View::render(
                'usuarios/confirmado',
                [
                    'title' => 'Confirmación Exitosa',
                    'message' => 'Tu cuenta ha sido confirmada. Ahora puedes continuar con el pago. Te hemos enviado un correo con los detalles.',
                    'urlPago' => $urlPago
                ]
            );
        } catch (\Exception $e) {
            error_log("Error en confirmación de usuario: " . $e->getMessage());
            (new ErrorController())->internalServerError('Hubo un problema al confirmar tu cuenta. Inténtalo más tarde.');
        }
    }
}
