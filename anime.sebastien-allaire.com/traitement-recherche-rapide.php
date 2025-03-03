<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";

$resultats = [];
if (!empty($_GET['mot'])) {
    $mot = filter_var($_GET['mot'], FILTER_SANITIZE_SPECIAL_CHARS);

    $resultats = PersonnageDAO::rechercheRapide($mot);
}

$titre = "Personnage";

require 'header.php';

?>

<div class="hauteur">
    <h1>Personnages</h1>
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
