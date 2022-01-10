<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$id_rezervare = $_SESSION['id_rezervare'];
ob_start();
//echo $id_rezervare;
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/includes/phpmailer/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/phpmailer/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/phpmailer/SMTP.php';
$email_user = $_SESSION["email"];
$mail = new PHPMailer(false);
$mail->isSMTP();
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'cinemacerce@gmail.com'; // email
$mail->Password = 'SimplePassword!1'; // password
$mail->setFrom('cinemacerce@gmail.com', 'Cinema Cerce'); // From email and name
$mail->addAddress($email_user, ' '); // to email and name
$mail->Subject = 'Rezervare Bilete Cinema';
//$mail->msgHTML("Buna! Multumim pentru rezervare."); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                echo "-----aici------------";
$mail->IsHTML(true);
$mail->AddEmbeddedImage('../phpqrcode/temp/'.$id_rezervare.'.png','testImage','test.gif');

//echo '<img src="../phpqrcode/temp/'.$id_rezervare.'.png">';
$mail->Body ='<img src="../phpqrcode/temp/'.$id_rezervare.'.png">';
$mail->Body .= '<h2>Multumim pentru rezervare!</h2><br>';
ob_end_clean();
if(!$mail->send()){
    //echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    header("Location: ../../browse.php?error=none");
    //echo "Message sent!";
}
