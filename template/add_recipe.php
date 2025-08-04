<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit();
}

if(isset($_POST["title"]) && !empty($_POST["title"])) {
    $title=htmlentities(trim($_post["title"])) ;
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    if(function_exists('ajouter-recette')) {
        $result = add_recipe($title, $description); // adapter le nom de la fonction avec le crud
        if ($result !== null) {
            header("Location: index.php?success=1");
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter une recette</h1>
    <a href="index.php">&larr; Retour à la liste des recettes</a>
    <form action="add_recipe.php" method="POST">
        <input type="text" name="title" placeholder="Titre de la recette ..." required>
        <textarea name="recipe" placeholder="Ingrédients et recette ..." required></textarea>
        <button>Ajouter</button>
    </form>
    
</body>
</html>
