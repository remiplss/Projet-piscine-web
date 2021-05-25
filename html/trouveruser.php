<?php

session_start();
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$Email = isset($_POST["mail"])? $_POST["mail"] : "";
//identifier votre BDD

$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if (isset($_POST["button1"])) {
    if ($db_found) {
        
    $sql = "SELECT * FROM utilisateur";
    
        if ($Pseudo != "") {
    
            $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";
            if ($Email != "") {
                $sql .= " AND Email LIKE '%$Email%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
    
        if (mysqli_num_rows($result) == 0) {
      
            echo "Utilisateur  non trouvé";
        }
        
        else {
    
            while ($data = mysqli_fetch_assoc($result)) {
               /* echo "ID: " . $data['ID'] . "<br>";
                echo "Type: " . $data['Type'] . "<br>";
                echo "Pseudo: " . $data['Pseudo'] . "<br>";
                echo "Email: " . $data['Email'] . "<br>";
                echo "<br>";*/

                $_SESSION['ID'] = $data['ID'];
                $_SESSION['Type'] = $data['Type'];
                $_SESSION['Pseudo'] = $data['Pseudo'];
                $_SESSION['Email'] = $data['Email'];

                header('Location : modification.php');
            }
        }
    }
        else {
            echo "Database not found";
        }
}
//fermer la connexion
mysqli_close($db_handle);
?>