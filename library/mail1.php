<?php
      use PHPMailer\PHPMailer\PHPMailer;

      require "vendor/autoload.php";
      $mail = new PHPMailer();
      $mail->CharSet = "UTF-8";
      $mail->isSMTP();
      $mail->Host = "mx1.hostinger.com.br";
      $mail->Port  = 587;
      $mail->SMTPSecure= 'tls';
      $mail->SMTPAuth = true;
      $mail->SMTPDebug = 4;
      $mail->Username = "adm@adaptspace.com.br";
      $mail->Password ="J3@adapt4.0";
      
      
      $mail->setFrom('adm@adaptspace.com.br','AdaptSpace'); 

      
    $mail->addAddress("$email", "$firstname");
    $mail->AddCC('adm@adaptspace.com.br','AdaptSpace');
    $mail->Subject = 'Boas-vindas - Adapt Space ';
    $mail->msgHTML("
   <html>
   
    <head>
     <meta charset='UTF-8'>
      <!-- Latest compiled and minified CSS -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

<!-- jQuery library -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<!-- Latest compiled JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <title>Confirmação de cadastro</title>
    <h5> Boas-Vindas! Adapt Space - A Plataforma de Digital Influencers do Brasil</h5>
    </head>
    <body>
    <img src='https://media.giphy.com/media/ASd0Ukj0y3qMM/giphy.gif'>
    <p><strong>Olá,  {$firstname} {$lastname}</p>
    <p>Estamos felizes demais por você ter se cadastrado em nossa plataforma, e temos certeza de que você vai adorá-la =) <br>
    Criamos a Adapt Space para que você possa adquirir itens exclusivos criados por seus <strong>influencers</strong> preferidos.
    Usamos muita tecnologia para tornar isso possível. Somos o primeiro crowdfunding de produtos criados por digital influencers da América Latina.<br><br>
    
    <strong>Nossos produtos</strong> são de altíssima qualidade e as estampas são feitas para durarem muitos anos, usamos o melhor metódo de estamparia disponível hoje.
    Nossas camisetas são 100% Algodão e nossos moletons são fofinhos para te aquecer e trazer estilo de um jeito confortável.<br>
    
    <strong>Nossa confecção</strong> conta com um setor de qualidade e todos os produtos são enviados após o término de cada  campanha dentro de uma caixa criada exclusivamente para seu influencer preferido chegar até você.<br>
    
    Somos apaixonados por <strong>ótimas experiências</strong> e queremos que você conte com nosso time para tirar qualquer dúvida que possa surgir.<br>
    
    
    Para acessar a plataforma </p>
    <p> <a href='http://www.adaptspace.com.br/index.php' class='btn btn-success'> CLIQUE AQUI </a> ou <a href='http://www.adaptspace.com.br/index.php'>AQUI</a>
    </body>
    </html> ");
    $mail->AltBody= "Adapt Space - Cadastro realizado com Sucesso. {$firstname} {$lastname}" ;
    $mail->send();
    
   // if (!$mail->send()){
   //     echo "erro" . $mail->ErrorInfo();
//
   // }else{
   //     echo "message sent";
//
   // }
//
?>