<?php

namespace Jd\Amisam\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->setup();
    }

    private function setup()
    {
        try {
            // Configurar SMTP
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.hostinger.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'no-reply@autocadtotal.com';
            $this->mailer->Password = 'Samirita_1103@';
            $this->mailer->SMTPSecure = 'ssl';
            $this->mailer->Port = 465;

            // Configuración general
            $this->mailer->setFrom('no-reply@autocadtotal.com', 'Amisam');
            $this->mailer->isHTML(true); // Permitir HTML en los correos
            $this->mailer->CharSet = 'UTF-8';
        } catch (Exception $e) {
            throw new \Exception("Error al configurar PHPMailer: " . $e->getMessage());
        }
    }

    public function sendEmail($to, $subject, $template, $variables = [])
    {
        try {
            $templatePath = __DIR__ . "/../templates/emails/{$template}.html";

            if (!file_exists($templatePath)) {
                error_log("Error: La plantilla de correo no existe: " . $templatePath);
                return false;
            }

            $body = $this->loadTemplate($templatePath, $variables);

            if (!$body) {
                error_log("Error: No se pudo cargar la plantilla de correo.");
                return false;
            }

            #error_log($body);
            error_log("Enviando correo a: $to con asunto: $subject");

            $this->mailer->clearAddresses();
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            if ($this->mailer->send()) {
                error_log("Correo enviado correctamente a: $to");
                return true;
            } else {
                error_log("PHPMailer Error: " . $this->mailer->ErrorInfo);
                return false;
            }
        } catch (Exception $e) {
            error_log("Error al enviar el correo: " . $e->getMessage());
            return false;
        }
    }

    private function loadTemplate($templatePath, $variables)
    {
        $template = file_get_contents($templatePath);
        foreach ($variables as $key => $value) {
            if ($key === 'qr_url') {
                $template = str_replace("{{{$key}}}", $value, $template);
            } else {
                $template = str_replace("{{{$key}}}", htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8'), $template);
            }
        }
        return $template;
    }
}
