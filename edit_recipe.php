<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit();
}

$task = null;
$isError = false;
if(isset($_GET["id"])) {
    if(function_exists('get_recipe')) {
        $recipe = get_recipe((int)$_GET["id"]);
        if(!$recipe) {
            $isError = true;
        }
    }
} else {
    $isError = true;
}

if(isset($_POST["title"]) && isset($_POST["description"]) && !$isError) {
    $database = connect_database();
    $stmt = $database->prepare("UPDATE recette SET title = ?, description = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([
        $_POST["title"],
        $_POST["description"],
        $recipe["id"],
        $_SESSION["user_id"]
    ]);
    header("Location: index.php?updated=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la recette</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <a href="index.php" class="back-link">&larr; Retour à la liste</a>
        <h1>Modifier la recette</h1>
    </div>
    <?php if($isError): ?>
        <p>Recette introuvable ou accès non autorisé.</p>
    <?php else: ?>
    <form action="" method="post">
        <input type="text" name="title" value="<?= htmlspecialchars($task["title"]) ?>" required>
        <textarea name="description" rows="4" required><?= htmlspecialchars($recipe["description"]) ?></textarea>
        <button type="submit">Enregistrer</button>
    </form>
    <?php endif; ?>
</body>
</html>
