<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit();
}

if(isset($_POST["title"]) && !empty(trim($_POST["title"]))) {
    $desc = isset($_POST["description"]) ? $_POST["description"] : "";
    if(function_exists('ajouter-recette')) {
        $result = add_recipe($_POST["title"], $desc); // adapter le nom de la fonction avec le crud
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
    <a href="index.php" class="add-recipe">&larr; Retour à la liste des recettes</a>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Titre de la recette ..." required>
        <textarea name="recipe" placeholder="Ingrédients et recette ..." rows="4"></textarea>
        <button>Ajouter</button>
    </form>
    
</body>
</html>
