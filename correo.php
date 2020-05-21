<?php
require_once "mail/class.phpmailer.php";

session_start();
define("FROM_ADDRESS", "16030851@itesa.edu.mx");
define("PASSWORD", "koretzo0160");
define("FROM_NAME", "ITESA-ArturoDB");
$now = date_create('now')->format('Y-m-d');
$sendTo = "tkfmutsurini@gmail.com";
$subject = 'Notificacion de respaldo '.$now;
$content = 'El usuario '.$_SESSION['usuario'].' ha creado un respaldo de la base de datos,
            almacenandola en el servidor con el nombre de "'.$_SESSION['backup'].'"
            y descargado una copia de la base de datos';
$result = send_mail($sendTo, $subject, $content);

function send_mail($email, $subject, $content){
    $mail = new PHPMailer(true);
    try{
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;
        $mail->Username   = FROM_ADDRESS;
        $mail->Password   = PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
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
    }catch (Exception $e){
        print_r($e->getMessage());
        return false;
    }return true;
}
header('location: index.php');
?>
