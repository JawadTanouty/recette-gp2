<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
require_once "crud_users.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    add_user($email, $password);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required><br>
        
        <button>ajout</button>
</form>    
</body>
</html>