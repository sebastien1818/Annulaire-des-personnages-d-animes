<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";
//require CHEMIN_ACCESSEUR . "ClicDAO.php";

//ClicDAO::enregistrerVisite($_SERVER);

$idPersonnage = filter_var($_GET['extra'], FILTER_SANITIZE_NUMBER_INT);

$personnage = PersonnageDAO::lirePersonnages($idPersonnage);

$titre = $personnage['nom'];
require "header.php";

?>

<h1>Personnage</h1>

<section id="contenue">
    <div class="personnage">
    <div class="images-personnage"> <img src="images/<?=$personnage['image']?>" alt="illustration"> </div>
        <h3 class="nom">Nom : <?=$personnage['nom']?></h3>
        <p class= "race">Race : <?=$personnage['race']?></p>
        <p class= "genre">Genre : <?=$personnage['genre']?></p>
        <p class= "affiliation">Affiliation : <?=$personnage['affiliation']?></p>
        <p class= "equipe">Équipe : <?=$personnage['equipe']?></p>
        <p class= "famille">Famille : <?=$personnage['famille']?></p>
        <p class= "magie">Magie : <?=$personnage['magie']?></p>
        <p class= "equipement">Équipement : <?=$personnage['equipement']?></p>
    </div>
</section>

<?php
require 'footer.php';
?>
