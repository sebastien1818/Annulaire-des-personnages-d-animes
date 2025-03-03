<?php
require "configuration.php";
$titre = "Contacter";
require "header.php";
?>

<div id="contact">
    <h1> Nous contacter</h1>
<?php
include "traitement-contact.php";
?>
    <form method="post">
        <input type="text" name="nom" id="nom" class="champ" placeholder= "votre nom"><br/>
        <input type="email" name="email" id="email" class="champ" placeholder= "votre email"><br/>
        <textarea name="message" id="message" cols="30" rows="10" placeholder= "votre message"></textarea><br/>
        <input type="submit" name="valider" value="Envoyer votre message" class="bouton3">
    </form>
</div>

<?php
require "footer.php";