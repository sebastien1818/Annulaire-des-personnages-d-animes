<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";

$nomRecherche = filter_var($_GET['recherche-nom'], FILTER_SANITIZE_SPECIAL_CHARS);
$raceRecherche = filter_var($_GET['recherche-race'], FILTER_SANITIZE_SPECIAL_CHARS);
$genreRecherche = filter_var($_GET['recherche-genre'], FILTER_SANITIZE_SPECIAL_CHARS);
$affiliationRecherche = filter_var($_GET['recherche-affiliation'], FILTER_SANITIZE_SPECIAL_CHARS);

$resultats = [];

if (!empty($nomRecherche) || !empty($raceRecherche) || !empty($genreRecherche) || !empty($affiliationRecherche)) {
    $resultats = PersonnageDAO::rechercheAvancee($nomRecherche, $raceRecherche, $genreRecherche, $affiliationRecherche);
}

$titre = "Personnage";

require 'header.php';

?>

<div class="hauteur">
    <h1>Personnage</h1>
    <h2>Résultats de recherche</h2>
    <br>
    <div id="resultats-recherche">
        <?php
foreach ($resultats as $resultat) {
    ?>
        <div class= "info">
            <div class="texte">
                <h3 class="nom">Nom : <?=$resultat['nom']?></h3>
                <p class= "race">Race : <?=$resultat['race']?></p>
                <p class= "genre">Genre : <?=$resultat['genre']?></p>
                <p class= "affiliation">Affiliation : <?=$resultat['affiliation']?></p>
                <a href="personnage.php?extra=<?=$resultat['id_fairy_tail']?>" class="bouton">En savoir plus</a>
            </div>
            <div class="images"> <img src="images/<?=$resultat['image']?>" alt="illustration"> </div>
        </div>
        <?php

}
?>

    </div>
</div>

<?php
require 'footer.php';
?>
