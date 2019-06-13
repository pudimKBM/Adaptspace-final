<?php
try{



    session_start();
  
    
$pnome       = $_POST['nome1'];
$pnome2      = $_POST['nome2'];
$pdtnasc     = $_POST['data'];
$psex        = $_POST['sex'];
$prua        = $_POST['rua'];
$pcidade     = $_POST['cidade'];
$pestado     = $_POST['estado'];
$ppais       = $_POST['pais'];
$pcep        = $_POST['cep'];
$pnumeroc    = $_POST['numcas'];
$pbairro     = $_POST['bairro'];
$pcomp       = $_POST['complemento'];
$ptel        = $_POST['tel'];
$ptel2       = $_POST['tel2'];
$is = $_SESSION['id'];
include '../db.php';



     $qinsert = "INSERT INTO Info_extra(Nome, Sobrenome, dt_nasc, Sexo, Rua, Cidade,
      Estado, Pais, cep, Numero, Bairro, Comlpemento, Telefone, Celular, id_usr)
        VALUES ('$pnome',
        '$pnome2',
        '$pdtnasc',
        '$psex',
        '$prua',
        '$pcidade',
        '$pestado',
        '$ppais',
        '$pcep',
        '$pnumeroc',
        '$pbairro',
        '$pcomp',
        '$ptel',
        '$ptel2',
        '$is')"; 
        $connection->query($qinsert);
        if (! $connection->query($qinsert) === TRUE) {
            
            echo "<h5 class='red-text'>Error: " . $qinsert . "</h5>" . $connection->error;
        }
        
        $connection->close();
    } catch (Exception $e) {
        echo "$e";
    }



              
            ?>