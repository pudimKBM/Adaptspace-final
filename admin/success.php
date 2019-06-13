<?php
  
  

    
 include '../db.php';
try {
    // resize_function//////////////////////////////////////////////////
    function CreateThumbs($src, $dst, $width, $height, $crop = 0)
    {
        list ($w, $h) = getimagesize($src);
        
        $type = strtolower(substr(strrchr($src, "."), 1));
        
        if ($type == 'jpeg')
            $type = 'jpg';
        switch ($type) {
            case 'bmp':
                $img = imagecreatefromwbmp($src);
                break;
            case 'gif':
                $img = imagecreatefromgif($src);
                break;
            case 'jpg':
                $img = imagecreatefromjpeg($src);
                break;
            case 'png':
                $img = imagecreatefrompng($src);
                
                break;
            default:
                return "Invalid Picture Type!";
        }
        
        // resize
        if ($crop) {
            if ($w < $width or $h < $height)
                return "Picture is too small!";
            $ratio = max($width / $w, $height / $h);
            $h = $height / $ratio;
            $x = ($w - $width / $ratio) / 2;
            $w = $width / $ratio;
        } else {
            if ($w < $width and $h < $height)
                return "Picture is too small!";
            $ratio = min($width / $w, $height / $h);
            $width = $w * $ratio;
            $height = $h * $ratio;
            $x = 0;
        }
        
        $new = imagecreatetruecolor($width, $height);
        if ($type == "gif" or $type == "png") {
            imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
            imagealphablending($new, false);
            imagesavealpha($new, true);
        }
        
        imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
        
        switch ($type) {
            case 'bmp':
                imagewbmp($new, $dst);
                break;
            case 'gif':
                imagegif($new, $dst);
                break;
            case 'jpg':
                imagejpeg($new, $dst);
                break;
            case 'png':
                imagepng($new, $dst);
                break;
        }
        
        return true;
    }
    
    
    
   
    

    function get_last_id()
    {
        $connection = $GLOBALS['connection'];
        $stmt = $connection->query('SELECT * FROM product');

        if ($stmt->num_rows > 0) {
            while ($row = $stmt->fetch_assoc()) {
                $last = $row["id"];
            }
            return $last;
        } else {
            return "0";
        }
    }
    
    $idproduct = get_last_id() + 1;
    
    require 'includes/pictures.php';
    $data = $_POST['imagef1'];
    $data = str_replace('data:image/png;base64,', '' , $data);
    $data = str_replace('', '+', $data);
    $data = base64_decode($data);
    $file = "../productsimg/".uniqid().'.png';
    file_put_contents($file, $data);
    $file = str_replace('../', '', $file);
    $name = $_POST['namef'];
    $price2 = $_POST['prcf'];
    $price = $_POST['prcf2'];
    $expdate = $_POST['expdatef'];
    $description = addslashes($_POST['descf']);
    $img_title = $file;
    $id = $_POST['id'];
    $id_category =$_POST['id_cat'];
    include '../library/campaing_confirmation.php';
    // adding product
    $queryaddproduct = "INSERT INTO product(id_category, name, description, price, price2, id_picture, thumbnail, id_usr, exp_date)
  VALUES ('$id_category', '$name', '$description','$price','$price2' ,'$idproduct', '$file' , '$id','$expdate')";
    
    if ($connection->query($queryaddproduct) === TRUE) {
        header('Location: ../index.php');
        echo "<div class='center-align'>
                 <h5 class='green-text'>Product Added Successfully</h5>
                 </div><br><br>";
    } else {
        echo "<h5 class='red-text '>Error: " . $queryaddproduct . "</h5><br><br><br>" . $connection->error;
    }
    
    $connection->close();
}catch (Exception $e) {
    echo  $e->getMessage();
}

?>
