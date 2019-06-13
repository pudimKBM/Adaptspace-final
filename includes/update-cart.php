<?php
 try{
    error_reporting(E_ALL);
    include '../db.php';

    $qtd = $_POST['qtd'];
    $idcommand = $_POST['command'];
    $idproduct = $_POST['id_product'];
    $querypic = "UPDATE command set quantity = $qtd where id_produit=$idproduct and id = $idcommand";
    //mysqli_query($connection, $querypic);

    if ($connection->query($querypic) === true){
        echo "sucesso";
    }
    else{
        echo "error";
    }
    

 }catch(Exception $e){
     echo $e->getMessage();
 }
?>