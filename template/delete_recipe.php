<?php
session_start();
require_once "bdd-crud.php";

if(isset($_GET["id"])){
    if(function_exists('delete_recipe')) {        // adapter le nom de la fonction avec le crud
        $isSuccess = delete_recipe($_GET["id"]); // doit être conforme au crud
    }
    header("Location: index.php");
    exit();
}



?>