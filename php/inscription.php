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
    exit();
}

if ($Email == "") {

    echo "<script>alert(\"email vide\")</script>";
    header('Location: compte.html');
    exit();
}

if ($MotDePasse == "") {

    echo "<script>alert(\"mot de passe vide\")</script>";
    header('Location: compte.html');
    exit();
}
 elseif ($db_found) {

    //on verifie si le compte existe
    $sql1 = "SELECT count(*) ID FROM utilisateur WHERE Password = '$MotDePasse' AND ( Pseudo='$Pseudo' OR Email='$Email')";
    $result1 = mysqli_query($db_handle, $sql1) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle)); 
    
   
    //si l'utilisateur n'existe pas
    if (mysqli_num_rows($result1)) {


        //on créé le compte
        //$_SESSION['Pseudo'] = $Pseudo;
        $sql = "INSERT INTO utilisateur (Type,Pseudo,Email,Password) VALUES ('$Type','$Pseudo','$Email','$MotDePasse') ";
        $result = mysqli_query($db_handle, $sql) or die('impossible d’ajouter cet enregistrement : ' . mysqli_error($db_handle));
        
        if($result){
        //ouverture de la page d'accueil
        header('Location: Page d\'accueil.html');
        mysqli_close($db_handle);
        
        }
    
    else{

        echo "<script>alert(\"l'utilisateur n'existe pas\")</script>";
    }


 
   }
    
 }



mysqli_close($db_handle);
