<?php

require "../configuration.php";
require_once CHEMIN_ACCESSEUR . "PersonnageDAO.php";

$titre = "modifier-personnage";
require "header.php";

$idPersonnage = filter_var($_POST['id_fairy_tail'], FILTER_SANITIZE_NUMBER_INT);

$reussiteSuppression = PersonnageDAO::supprimerPersonnage($idPersonnage);

if ($reussiteSuppression) {
    ?>
    <p> votre personnage a été supprimé </p>
    <?php
} else {
    echo "votre suppression a echoué";
}

require "../footer.php";

?>