<?php

require "configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$titre = "membre";
require "header.php";

?>

<div class="hauteur">
<?php

if (empty($_SESSION['membre']['pseudonyme'])) {
    include_once "membre/formulaire-membre.php";
    echo '<div>
    <a href="membre/inscription-identification.php" class="bouton">Créee un compte</a>;
    </div>';
} else {
    $membre = MembreDAO::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);
    include_once "membre/vue-membre-detail.php";
    echo '<div>
    <a href="membre/modifier-compte.php" class="bouton">Modifier</a>;
    <a href="membre/deconnexion.php" class="bouton">Se déconnecter</a><//div>';

}

?>
</div>

<?php
require 'footer.php';
?>
