<?php

require "../configuration.php";
require_once CHEMIN_ACCESSEUR . "PersonnageDAO.php";

$titre = "modifier-personnage";
require "header.php";

$FILTRES_PERSONNAGE = array(
    'id_fairy_tail' => FILTER_SANITIZE_NUMBER_INT,
    'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
    'race' => FILTER_SANITIZE_SPECIAL_CHARS,
    'genre' => FILTER_SANITIZE_SPECIAL_CHARS,
    'affiliation' => FILTER_SANITIZE_SPECIAL_CHARS,
    'equipe' => FILTER_SANITIZE_SPECIAL_CHARS,
    'famille' => FILTER_SANITIZE_SPECIAL_CHARS,
    'magie' => FILTER_SANITIZE_SPECIAL_CHARS,
    'equipement' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$personnage = filter_input_array(INPUT_POST, $FILTRES_PERSONNAGE);

$personnage['famille'] = addslashes($_POST['famille']);
$personnage['magie'] = addslashes($_POST['magie']);
$personnage['equipement'] = addslashes($_POST['equipement']);

$image = $_FILES['image']['name'];

$repertoire_illustration = "../images/";

$fichierDestination = $repertoire_illustration . basename($_FILES['image']['name']);
$fichierSource = $_FILES['image']['tmp_name'];
$extensionFicher = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

if ($_FILES['image']['size'] > 5000000) {
    echo ("L'image est trop volumineuse");
} else if ($extensionFicher != "jpg" && $extensionFicher != "png" && $extensionFicher != "svg") {
    echo ("Veuillez ajouter un format d'image valide");
} else {

    if (move_uploaded_file($fichierSource, $fichierDestination)) {
        $reussiteModification = PersonnageDAO::modifierPersonnage($personnage, $image);
        if ($reussiteModification) {
            ?>
    <p> votre personnage a été modifié </p>
    <?php
}
    } else {
        echo "votre modification a echoué";
    }
}

require "../footer.php";

?>

