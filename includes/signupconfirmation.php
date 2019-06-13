<?php
if (isset($_POST['aggree'])) {
      
  
error_reporting(E_ALL);
    try {
        
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $usertype = $_POST['type'];
        
        $encryptedpass = md5($password);
        if (! isset($usertype)) {
            $usertype = 'client';
        }
        
        include 'db.php';
        
        // connecting & inserting data
        // VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
        //INSERT INTO `users`( `email`, `firstname`, `lastname`, `password`, `role`,rec_date) VALUES ( 'pudimkbm@gmail.com', 'Antonio Vinicius ', 'Liberato', '4ffe88f79aeb122f6baf8489f7a2694d', 'admin', 0)
        $query = "INSERT INTO `users`( `email`, `firstname`, `lastname`, `password`, `role`,rec_date) VALUES (
'$email',
'$firstname',
'$lastname',
'$encryptedpass',
'$usertype',
    0)";
        
        if (! $connection->query($query) === TRUE) {
            
            echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
        }else {
            echo "<h5> Conta criada com sucesso. <a href='https://adaptspace.com.br/login.php'>Clique aqui</a>Faça seu login";
            header ('location:login.php');
            include 'library/mail1.php';            
        }
        
        $connection->close();
    } catch (Exception $e) {
        echo "$e";
    }
}

?>
