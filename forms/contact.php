<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();
$header = '<b>Customer Name:</b> '.$_POST['name'].'<br><b>Email: </b>'.$_POST['email'].'<br><br>';

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Debugging: 1 = errors and messages, 2 = messages only
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tileandcarpetgallery@gmail.com';       // SMTP username
    $mail->Password   = 'tcgtestemail1!';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable SSL encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('tileandcarpetgallery@gmail.com', 'Tile and Carpet Gallery');
    $mail->addAddress($_POST['email'], $_POST['name']);         // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $header.$_POST['message'];

    $mail->send();
    echo 'OK';
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}