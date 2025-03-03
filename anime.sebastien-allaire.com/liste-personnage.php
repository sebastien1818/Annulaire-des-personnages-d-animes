<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";
//require CHEMIN_ACCESSEUR . "ClicDAO.php";

$listePersonnages = PersonnageDAO::listerPersonnages();

//ClicDAO::enregistrerVisite($_SERVER);

$titre = "Liste des personnages";

require 'header.php';

?>

<div class="hauteur">
    <h1>Fairy tail</h1>
    <h2>Liste des Personnages</h2>
    <br>
    <div id="liste-personnage">
        <?php
foreach ($listePersonnages as $personnage) {
    ?>
        <div class= "info">
        <div class="texte">
            <h3 class="nom">Nom : <?=$personnage['nom']?></h3>
            <p class= "race">Race : <?=$personnage['race']?></p>
            <p class= "genre">Genre : <?=$personnage['genre']?></p>
            <p class= "affiliation">Affiliation : <?=$personnage['affiliation']?></p>
            <a href="personnage.php?extra=<?=$personnage['id']?>" class="bouton">En savoir plus</a>
        </div>
        <div class="images"> <img src="images/<?=$personnage['image']?>" alt="illustration"> </div>
        </div>
        <?php

}
?>

    </div>
</div>

<?php
require 'footer.php';
?>





