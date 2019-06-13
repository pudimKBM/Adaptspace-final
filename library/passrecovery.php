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
    $mail->Password ="J3@adapt4.0";
      
      
      $mail->setFrom('adm@adaptspace.com.br','AdaptSpace'); 

    $mail->addAddress("$email", "$firstname");
    //$mail->addBCC("adm@adaptspace.com.br", "AdaptSpace");
    $mail->Subject = 'Recuperaçao de senha AdaptSpace';
    $mail->msgHTML("
    <html>
    <head>
     <meta charset='UTF-8'>
    <title>Opa esqueceu sua senha</title>
    <h4> Ve se nao esquece dessa vez hein XD </h4>
    </head>
    <body>
    <p> Meeeeeu gamigo </p>
    <a href='https://www.adaptspace.com.br/recover.php?email=$email' > Clique aqui para recupera o email</a>
    <p> </p>
    </body>
    </html>");
    $mail->AltBody= "Seu link para recuperaçao de senha  https://www.adaptspace.com.br/recover.php?email=$email" ;
    $mail->send();
  //if (!$mail->send()){
  //    echo "erro" . $mail->ErrorInfo();
  //}else{
  //    echo "message sent";
  //}

?>