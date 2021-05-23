<?php 


$msg = "Nom:\t$nom\n";
$msg .= "Prénom:\t$prenom\n";
$msg .= "Mail:\t$mail\n\n";
$msg .= "Message:\t$message\n\n\n";


$recipient = "ecemarketplacegroupe8@gmx.fr";
$subject = "Formulaire";

$mailheaders = "From: Mon test de formulaire<> \n";
$mailheaders .= "Reply-To: $mail\n\n";

mail($recipient, $subject, $msg, $mailheaders);

echo "<HTML><HEAD>";
echo "<TITLE>Formulaire envoyer!</TITLE></HEAD><BODY>";
echo "<H1 align=center>Merci, $nom </H1>";
echo "<P align=center>";
echo "Votre formulaire à bien été envoyé !</P>";
echo "</BODY></HTML>";

?>