<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Server settings


function posti($emailTo, $msg, $subject){
   include("../tunnukset.php"); 
   try {
                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '$sahkoposti';                     // SMTP username
    $mail->Password   = '$tunnussana';                               // SMTP password
    $mail->SMTPSecure = "PHPMailer::ENCRYPTION_STARTTLS";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;
    //Recipients
    $mail->setFrom('hannamari.paalanen@gmail.com', 'Kukkatalo Neilikka');
    $mail->addAddress($emailTo);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '$subject';
    $mail->Body    = '$msg';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<p>Vahvistusviesti on lähetetty. </p>";
} catch (Exception $e) {
    echo "<p>Vahvistusviestiä ei voitu lähettää. Mailer Error: {$mail->ErrorInfo}. </p>";
}
};
?>