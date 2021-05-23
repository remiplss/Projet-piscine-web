<?php

$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type = 'acheteur';
$Login = isset($_POST["login"]) ? $_POST["login"] : "";
$MotDePasse = isset($_POST["password"]) ? $_POST["password"] : "";

if ($Login == "") {

    echo "<script>alert(\"login vide\")</script>";
    header('Location: compte.html');
}

if ($MotDePasse == "") {

    echo "<script>alert(\"mot de passe vide\")</script>";
    header('Location: compte.html');


} 

elseif ($db_found) {

    $sql = "SELECT count(*) ID FROM utilisateur WHERE Password = '$MotDePasse' AND ( Pseudo='$Login' OR Email='$Login')";
    $result = mysqli_query($db_handle, $sql) ;
    
    
   

    if (!mysqli_query($db_handle, $sql)) {
        die('erreur requete: ' . mysqli_error($db_handle));
    }

     $rows = mysqli_num_rows($result);
 
     if($rows == 1){
       
        $_SESSION['Pseudo'] = $pseudo;
        header('Location: Page d\'accueil.html');
    }else{
      $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }

   
} else {
    echo "<br>Database not found";
}




mysqli_close($db_handle);
?>