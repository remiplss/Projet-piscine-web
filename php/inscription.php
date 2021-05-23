<?php

$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type = 'acheteur';
$Pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$Email = isset($_POST["mail"]) ? $_POST["mail"] : "";
$MotDePasse = isset($_POST["password"]) ? $_POST["password"] : "";

if ($Pseudo == "") {

   echo "<script>alert(\"pseudo vide\")</script>";
   header('Location: compte.html');
}
    
if ($Email == "") {
   
    echo "<script>alert(\"email vide\")</script>";
    header('Location: compte.html');
}
    
if ($MotDePasse == "") {
    
    echo "<script>alert(\"mot de passe vide\")</script>";
    header('Location: compte.html');
}

elseif ($db_found) {
    $sql = "INSERT INTO utilisateur (ID,Type, Pseudo, Email, Password) VALUES ('','$Type','$Pseudo','$Email','$MotDePasse')";
   $result = mysqli_query($db_handle,$sql);
   if (!mysqli_query($db_handle,$sql))
   {
   die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));
   }
   
    header('Location: Page d\'accueil.html');
    
} else {
    echo "<br>Database not found";
}




mysqli_close($db_handle);
