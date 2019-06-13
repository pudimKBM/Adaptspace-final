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

      
    $mail->addAddress("adm@adaptspace.com.br", "AdaptSpace");
    
    $mail->Subject = 'Bem-vindo à Adapt Space';
    $mail->msgHTML("
    <html>
    <head>
     <meta charset='UTF-8'>
    <title>Confirmaçao de registro</title>
    <h4> Comfirmaçao de campanha </h4>
    </head>
    <body>
    <p>Pedido de criaçao</p>
    <p>nome do produto: {$name}</p>
    <p>lucro do influencer: {$price2}</p>
    <p>preço: {$price}</p>
    <p>data de expiraçao: {$expdate}</p>
    <p>descriçao do prduto: {$description}</p>
    <p>idUsuario: {$id}</p>
    <p>Bem-vindo à AdaptSpace </p>
    <p>e-mail: {$_SESSION['email']} </p>
    </body>
    </html>");
    $mail->AltBody= "Bem vindo {$_SESSION['email']} {$name} {$price2} {$price} {$expdate} {$description} {$id}" ;
    $mail->send();
    if (!$mail->send()){
        echo "erro" . $mail->ErrorInfo();

   }else{
        echo "message sent";

   }

?>