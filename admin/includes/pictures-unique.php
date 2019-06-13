<?php
$data = $_POST['imagef1'];
$name = $_POST['namef'];
$data = str_replace('data:image/png;base64,', '' , $data);
$data = str_replace('', '+', $data);
$data = base64_decode($data);
$file = "../../../unique-products/".$name.'.png';
$filesave = "../unique-products/".$name.'.png';
$id = $_POST['id'];
file_put_contents($file, $data);
// 3 pictures
CreateThumbs($file, $file, 602, 600, 1);
// adding pictures
$querypic = "INSERT INTO pictures(picture, id_produit, id_usr)
VALUES ('$file', '$idproduct', '$id')";
mysqli_query($connection, $querypic);

$data = $_POST['imagef2'];
$data = str_replace('data:image/png;base64,', '' , $data);
$data = str_replace('', '+', $data);
$data = base64_decode($data);
$file = "../../unique-products/".$name.'-estampa.png';
$id = $_POST['id'];
file_put_contents($file, $data);
// 3 pictures
CreateThumbs($file, $file, 602, 600, 1);
// adding pictures
$querypic = "INSERT INTO pictures(picture, id_produit, id_usr)
VALUES ('$file', '$idproduct', '$id')";
mysqli_query($connection, $querypic);



?>
