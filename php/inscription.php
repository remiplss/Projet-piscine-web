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
    $sql2 = "SELECT * FROM utilisateur";
    echo "<h1>test</h1>";
    $result2 = mysqli_query($db_handle, $sql2);
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<th>" . "type" . "</th>";
    echo "<th>" . "pseudo" . "</th>";
    echo "<th>" . "mail" . "</th>";
    echo "<th>" . "mdp" . "</th>";
    echo "</tr>";

    while ($data = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>" . $data['Type'] . "</td>";
        echo "<td>" . $data['Pseudo'] . "</td>";
        echo "<td>" . $data['Email'] . "</td>";
        echo "<td>" . $data['Password'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    header('Location: Page d'acc.html');
} else {
    echo "<br>Database not found";
}



mysqli_close($db_handle);
