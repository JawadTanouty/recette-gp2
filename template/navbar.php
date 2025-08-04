<?php if (connected condition is true){ //condition à faire, vérifiez si l'utilisateur est connecté?>
<nav>
  <ul>
    <li><a href="index.php">accueil</a></li>
    <li><a href="touterecette.php">toutes les recettes</a></li>
    <li><a href="vosrecette.php">vos recettes</a></li> <!-- fichier à créer, pensé à renommer -->
    <li><a href="ajouter-recette.php">ajouter une recette</a></li>
    <li><a href="modif-recette.php">modifié une recette</a></li>  <!-- fichier à créer, pensé à renommer -->
    <ul>
</nav>
<?php } else { ?>
<nav> <li><a href="index.php">accueil</a></li>
       <li><a href="touterecette.php">toutes les recettes</a></li></nav>  <!-- fichier à créer, pensé à renommer -->
<?php } ?>