<?php
$login = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
$pass = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$users = array("toto" => "totomdp", "titi" => "titimdp", "tutu" => "123tutu123");
$found = false;
foreach ($users as $key => $value) {
  if ($key == $login) {
    $found = true;
    break;
  }
}
$connexion = false;
if ($found) {
  for ($i = 0; $i < count($users); $i++) {
    if ($users[$login] == $pass) {
      $connexion = true;
      break;
    }
  }
}
if (!$found) {
  echo "Connexion refusée. Utilisateur inconnu.";
} else {
  if ($connexion) {
    echo "Connexion okay.";
  } else {
    echo "Connexion refusée. Mot de passe invalide.";
  }
}
?>