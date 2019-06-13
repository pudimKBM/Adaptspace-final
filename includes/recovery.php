<?php
if (isset($_POST['submit'])){
include 'db.php'; 
    $email =  $_POST['email'];
    $queryrec = "SELECT * FROM `users` WHERE `email`= '$email'";
    $queryrecfst = $connection->query($queryrec);
 if($queryrecfst->num_rows > 0){
     while($queryf = $queryrecfst->fetch_assoc()){
         $email = $queryf['email'];
         $firstname = $queryf['firstname'];
         $lastname = $queryf['lastname'];
         $rec_valid = $queryf['rec_valid'];
        

     }
     if($rec_valid == 0){
        include 'library/passrecovery.php';
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d-m-Y');;
    $datefin= date('d-m-Y', strtotime($date. ' + 2 days'));
    $query_date = "UPDATE `users` SET `rec_date`= '$datefin',`rec_valid` = 1  WHERE `email` = '$email' ";
    $queryrecfst = $connection->query($query_date);
    echo "e-mail enviado";
    }

}else {
    echo "<h1> insira um e-mail válido </h1>";
}
}

?>