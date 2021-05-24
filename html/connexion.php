<?php
session_start();
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type = 'acheteur';
$Login = isset($_POST["login"]) ? $_POST["login"] : "";
$MotDePasse = isset($_POST["password"]) ? $_POST["password"] : "";

 $_SESSION['Pseudo'] = $Login;
 
if ($Login == "") {

    echo "<script>alert(\"login vide\")</script>";
    header('Location: compte.php');
}

if ($MotDePasse == "") {

    echo "<script>alert(\"mot de passe vide\")</script>";
    header('Location: compte.php');


} 

elseif ($db_found) {

    $sql = "SELECT count(*) ID FROM utilisateur WHERE Password = '$MotDePasse' AND ( Pseudo='$Login' OR Email='$Login')";
    $result = mysqli_query($db_handle, $sql) ;
    
    if (!mysqli_query($db_handle, $sql)) {
        die('erreur requete: ' . mysqli_error($db_handle));
    }

     $rows = mysqli_num_rows($result);
 
     if($rows == 1){
       
        $_SESSION['Connect'] = 1;//session connecté
        header('Location: Page d\'accueil.php');
    }else{
      $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      $_SESSION['Connect'] = 0;//session non connecté
    }
    //on recuppere l'id de l'utilisateur 
    $sql1 = "SELECT * FROM utilisateur WHERE  Pseudo='$Login' OR Email='$Login'";
    $result1 = mysqli_query($db_handle, $sql1) or die('erreur requete: ' . mysqli_error($db_handle));

    while($data =  mysqli_fetch_assoc($result1))
    {
        $_SESSION['ID'] = $data['ID'];
    }
    
    if (!mysqli_query($db_handle, $sql)) {
        die('erreur requete: ' . mysqli_error($db_handle));
    }


} else {
    echo "<br>Database not found";
}




mysqli_close($db_handle);
?>