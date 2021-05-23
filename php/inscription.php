<?php

$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type = 'acheteur';
$Pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$Email = isset($_POST["mail"]) ? $_POST["mail"] : "";
$MotDePasse = isset($_POST["password"]) ? $_POST["password"] : "";


if (isset($_POST["button_inscription"])) {

    if ($db_found) {
        $sql = "INSERT INTO utilisateur (Type, Pseudo, Email, Password)
        VALUES ($Type,$Pseudo,$Email,$MotDePasse);";
    }
    $sql = "SELECT * FROM utilisateur";
}
?>