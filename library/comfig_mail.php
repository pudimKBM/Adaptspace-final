<?php
use PHPMailer\PHPMailer\PHPMailer;

require "vendor/autoload.php";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "mx1.hostinger.com.br";
$mail->Port  = 587;
$mail->SMTPSecure= 'tls';
$mail->SMTPAuth = true;
$mail->Username = "adm@adaptspace.com.br";
$mail->Password ="J3@ta@ti27";


$mail->setFrom('adm@adaptspace.com.br','AdaptSpace'); 
?>