<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pago aprobado - Acceso a tu cuenta AcademiaCAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f1f3f6; margin: 0; padding: 20px;">

    <table align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center">
                <table width="100%"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <!-- Header con logo -->
                    <tr style="background: linear-gradient(135deg, #002244, #004488); text-align: center;">
                        <td style="padding: 20px;">
                            <table width="100%">
                                <tr>
                                    <td align="center">
                                        <img src="https://academiacad.com/img/amisam.png" alt="AcademiaCAD Logo"
                                            style="height: 100px; margin-bottom: 5px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <h1 style="color: #ffffff; font-size: 30px; font-weight: bold; margin: 0;">
                                            AcademiaCAD</h1>
                                        <p style="color: #e0e0e0; font-size: 16px; margin-top: 5px; font-weight: 500;">
                                            Clases virtuales de AutoCAD para profesionales
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Contenido principal -->
                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; color: #333;">Hola <strong>{{$fullName}}</strong>,
                            </p>

                            <p style="font-size: 16px; color: #555; margin-top: 15px;">
                                Tu <strong>pago ha sido aprobado</strong>. Ahora puedes acceder a tu cuenta en
                                <strong>AcademiaCAD</strong>.
                            </p>

                            <p style="font-size: 15px; color: #444; margin-top: 20px;">
                                Para continuar, por favor crea tu contraseña haciendo clic en el siguiente botón:
                            </p>

                            <p style="font-size: 15px; color: #444; margin-top: 20px;">
                                Recuerda que para acceder a tu cuenta usarás tu correo electrónico
                                <strong>{{$loginEmail}}</strong>
                                y la contraseña que crearás a continuación.
                            </p>

                            <p style="text-align: center; margin: 25px 0;">
                                <a href="{{ $resetUrl }}"
                                    style="background-color: #28a745; color: #fff; padding: 12px 24px; text-decoration: none; font-size: 16px; border-radius: 6px;">
                                    Crear mi contraseña
                                </a>
                            </p>

                            <p style="font-size: 14px; color: #777; margin-top: 30px;">
                                Si no solicitaste esta cuenta o tienes alguna duda, puedes ignorar este correo o
                                escribirnos.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 20px; text-align: center; font-size: 13px; color: #777;">
                            © 2025 AcademiaCAD. Todos los derechos reservados.<br>
                            <a href="https://academiacad.com"
                                style="color: #007bff; text-decoration: none;">www.academiacad.com</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>