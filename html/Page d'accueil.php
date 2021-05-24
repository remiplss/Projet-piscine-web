<?php
$database = "projet web";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Type ='';

    if(session_status() ==  PHP_SESSION_DISABLED) //si aucunes sessions
    {
    $testSession = 0;
    session_start();

    }

    if(session_status() ==  PHP_SESSION_NONE)//si sessions non definis
    {
   
    $testSession = 1;
    session_start();
    
    $test = $_SESSION['ID'];

$sql = "SELECT * FROM utilisateur WHERE ID = '$test'";
    $result = mysqli_query($db_handle, $sql) ;

    while($data = mysqli_fetch_assoc($result))
    {
        $Type = $data['Type'];


    }
    }

     

     $_SESSION['Connect'] = $testSession;




?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">        
        <link rel="stylesheet" type="text/css" href="compte.css">
=======
        <link rel="stylesheet" type="text/css" href="format.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var $carrousel = $('#carrousel'); // on cible le bloc du carrousel
                $img = $('#carrousel img'); // on cible les images contenues dans le carrousel
                indexImg = $img.length - 1; // on définit l'index du dernier élément
                i = 0; // on initialise un compteur
                $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)
                $img.css('display', 'none'); // on cache les images
                $currentImg.css('display', 'block'); // on affiche seulement l'image courante
                //si on clique sur le bouton "Suivant"
                $('.next').click(function () { // image suivante
                    i++; // on incrémente le compteur
                    if (i <= indexImg) {
                        $img.css('display', 'none'); // on cache les images
                        $currentImg = $img.eq(i); // on définit la nouvelle image
                        $currentImg.css('display', 'block'); // puis on l'affiche
                    } else {
                        i = indexImg;
                    }
                });
                //si on clique sur le bouton "Précédent"
                $('.prev').click(function () { // image précédente
                    i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"
                    if (i >= 0) {
                        $img.css('display', 'none');
                        $currentImg = $img.eq(i);
                        $currentImg.css('display', 'block');
                    } else {
                        i = 0;
                    }
                });
                function slideImg() {
                    setTimeout(function () { // on utilise une fonction anonyme
                        if (i < indexImg) { // si le compteur est inférieur au dernier index
                            i++; // on l'incrémente
                        } else { // sinon, on le remet à 0 (première image)
                            i = 0;
                        }
                        $img.css('display', 'none');
                        $currentImg = $img.eq(i);
                        $currentImg.css('display', 'block');
                        slideImg(); // on oublie pas de relancer la fonction à la fin
                    }, 4000); // on définit l'intervalle à 4000 millisecondes (4s)
                }
                slideImg(); // enfin, on lance la fonction une première fois
            });
        </script>
    </head>
    <body>
    	<header>
    		<a href="Page d'accueil.php"><img src="LOGOprojet.png" alt="Market place Logo" width="500"></a>
    	</header>
        <div class="nav-bar">
            <a href="Page d'accueil.php">Accueil</a>
            <a href="parcourir.html">Tout parcourir</a>
            <a href="notification.html">Notification</a>
            <a href="panier.html">Panier</a>
           <?php 
           
           if($_SESSION['Connect'] == 0)
            {
                
                echo '<a href="compte.php">Mon compte</a>';
                
            }
            else
            {
                if($Type == "acheteur")
                
            {
                
                echo '<a href="compteAcheteur.php">Mon compte</a>';
            }
            if($Type == "vendeur")
            {
                echo '<a href="compteVendeur.php">Mon compte</a>';
            }
            if($Type == "admin")
            {
                echo '<a href="compteAdmin.php">Mon compte</a>';
            }
             }?>
        </div>
        <div id="carrousel" >
            <ul>
                <li><img src="test1.jpg" width="700" height="400" /></li>
                <li><img src="test2.jpg" width="700" height="400" /></li>
                <li><img src="test3.jpg" width="700" height="400" /></li>
                <li><img src="test4.jpg" width="700" height="400" /></li>
            </ul>
        </div>
        <input type="button" value="Précédent" class="prev">
        <input type="button" value="Suivant" class="next">
        <footer>
        	<p class="footerstyle">
        		<br>
            	Copyright &copy; 2021 ECE MarketPlace<br>
            	<a href="contact.html">Contact</a>
            </p>
        </footer>
    </body>
</html>

