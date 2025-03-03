<?php

require "../configuration.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";

$listePersonnages = PersonnageDAO::listerPersonnages();

$titre = "Liste des Personnages";

require 'header.php';

?>
<div class="hauteur">
    <h1>Fairy tail</h1>
    <h2>Liste des personnages</h2>
    <div id="liste-personnage">
        <a href="ajouter-personnage.php" class="bouton">Ajouter</a>
        <?php
foreach ($listePersonnages as $personnage) {
    ?>

        <div class= "info">
        <div class="texte">
            <h3 class="nom">Nom : <?=$personnage['nom']?></h3>
            <p class= "race">Race : <?=$personnage['race']?></p>
            <p class= "genre">Genre : <?=$personnage['genre']?></p>
            <p class= "affiliation">Affiliation : <?=$personnage['affiliation']?></p>
            <a href="../personnage.php?extra=<?=$personnage['id_fairy_tail']?>" class="bouton">En savoir plus</a>
            <a href="modifier-personnage.php?extra=<?=$personnage['id_fairy_tail']?>" class="bouton">Modifier</a>
            <a href="effacer-personnage.php?extra=<?=$personnage['id_fairy_tail']?>" class="bouton">Supprimer</a>
        </div>
        <div class="images"> <img src="../images/<?=$personnage['image']?>" alt="illustration"> </div>
        </div>
        <?php

}
?>

    </div>
</div>

<?php
require '../footer.php';
?>
