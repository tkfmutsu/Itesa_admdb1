<?php
require_once "mail/class.phpmailer.php";

session_start();
define("FROM_ADDRESS", "16030851@itesa.edu.mx");
define("PASSWORD", "koretzo0160");
define("FROM_NAME", "ITESA-ArturoDB");
$now = date_create('now')->format('Y-m-d');
$sendTo = "tkfmutsurini@gmail.com";//$_POST["send_to"] ?? "";
$subject = 'Notificacion de respaldo '.$now;//$_POST["subject"] ?? "";
$content = 'El usuario '.$_SESSION['usuario'].' ha creado un respaldo de la base de datos,
            almacenandola en el servidor con el nombre de "'.$_SESSION['backup'].'"
            y descargado una copia de la base de datos';//$_POST["content"] ?? "";
$result = send_mail($sendTo, $subject, $content);

function send_mail($email, $subject, $content)
{
    $mail = new PHPMailer(true);
    try
    {
        $mail->CharSet = 'UTF-8';                                   // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = FROM_ADDRESS;                           // SMTP username
        $mail->Password   = PASSWORD;                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->setFrom(FROM_ADDRESS, FROM_NAME);
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->send();
    }catch (Exception $e)
    {
        print_r($e->getMessage());
        return false;
    }
    return true;
}

header('location: index.php');
?>
