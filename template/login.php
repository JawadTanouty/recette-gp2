<?php
$host = "127.0.0.1";
$database_name = "app-database";



// TODO Connection Utilisateur via la session
session_start();
if (
    isset($_POST["email"]) &&
    isset($_POST["password"])

) {
    $bdd = new PDO("mysql:host=$host;dbname=$database_name", "root", "root");

    $request = $bdd->prepare("SELECT * FROM User WHERE email=?");
    $request->execute([
        $_POST["email"]
    ]

    );
    $user = $request->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    if ($_POST["password"]==$user["password"]){
        $_SESSION["user_id"]=$user["id"];
        header("location:index.php");
    }


}



if ($_POST["password"] == $user["password"]) {
    $_SESSION["user_id"] = $user["id"];




}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="styles-login.css"/>
    <title>Document</title>
</head>

<body>
    <div align="center">
        <h1>Connexion</h1>
        <!-- TODO Formulaire de connexion -->
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="email" >
            <input type="password" name="password" placeholder="password" >

            <button>connecter</button><br>
        </form>
        <a href="index.php">Pas de compte ? S'inscrire</a>
</body>

</html>