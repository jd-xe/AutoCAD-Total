<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pago de Matrícula</title>
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f1f3f6; margin: 0; padding: 20px;">
    <table align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center">
                <table width="100%"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr style="background: linear-gradient(135deg, #002244, #004488); text-align: center;">
                        <td style="padding: 20px;">
                            <table width="100%">
                                <tr>
                                    <td align="center">
                                        <img src="https://autocadtotal.com//img/amisam.png" alt="AMISAM Logo"
                                            style="height: 100px; margin-bottom: 5px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <h1 style="color: #ffffff; font-size: 30px; font-weight: bold; margin: 0;">
                                            AMISAM</h1>
                                        <p style="color: #e0e0e0; font-size: 16px; margin-top: 5px; font-weight: 500;">
                                            Clases virtuales de AutoCAD para profesionales
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Contenido -->
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="color: #333; margin-bottom: 10px;">¡Gracias por registrarte,
                                {{$user->first_name }}!
                            </h2>

                            <p style="font-size: 16px; color: #555; line-height: 1.6;">
                                Para completar tu inscripción en <strong>AMISAM</strong>, realiza el pago de <strong>S/.
                                    {{$payment->amount}}</strong> mediante <strong>Yape</strong> escaneando el siguiente
                                código
                                QR:
                            </p>

                            <div style="text-align: center; margin: 25px 0;">
                                <img src="https://res.cloudinary.com/doy35yjhq/image/upload/fl_preserve_transparency/v1739248520/qr_1_hcnzcz.jpg?_s=public-apps"
                                    alt="Código QR de pago Yape" width="250"
                                    style="border-radius: 12px; box-shadow: 0 0 8px rgba(0,0,0,0.05);">
                            </div>

                            <p style="font-size: 15px; color: #444;">
                                Una vez realizado el pago, por favor sube tu comprobante en la plataforma para validar
                                tu matrícula.
                            </p>

                            <p style="text-align: center; margin: 25px 0;">
                                <a href="{{ $paymentLink }}"
                                    style="background-color: #28a745; color: #fff; padding: 12px 20px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                                    Subir Comprobante
                                </a>
                            </p>

                            <p style="font-size: 14px; color: #777; margin-top: 20px;">
                                ¿Tienes dudas? Contáctanos por WhatsApp al <strong>{{ $contactPhone }}</strong>.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr style="background-color: #f9f9f9;">
                        <td style="padding: 20px; text-align: center; font-size: 13px; color: #777;">
                            © 2025 AMISAM. Todos los derechos reservados.<br>
                            <a href="htautocadtotal.com"
                                style="color: #007bff; text-decoration: none;">www.autocadtotal.com</a>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>