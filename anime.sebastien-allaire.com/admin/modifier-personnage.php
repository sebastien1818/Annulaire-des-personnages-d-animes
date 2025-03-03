<?php

require "../configuration.php";
require_once CHEMIN_ACCESSEUR . "PersonnageDAO.php";

$idPersonnage = filter_var($_GET['extra'], FILTER_SANITIZE_NUMBER_INT);

$personnage = PersonnageDAO::lirePersonnages($idPersonnage);

$titre = "Panneau d'adminstration";
require "header.php";

?>

<div class="hauteur">
    <h1>Fairy tail</h1>
    <h2>Modifier un personnage</h2>

    <div id= "liste-personnage">
    <form action="traitement-modifier-personnage.php" method="post" enctype="multipart/form-data">
        <div class="champs">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id = "nom" value="<?=$personnage['nom']?>">
        </div>

        <div class="champs">
            <label for="race">Race :</label>
            <input type="text" name="race" id = "race" value="<?=$personnage['race']?>">
        </div>

        <div class="champs">
            <label for="genre">Genre :</label>
            <input type="text" name="genre" id = "genre" value="<?=$personnage['genre']?>">
        </div>

        <div class="champs">
            <label for="affiliation">Affiliation :</label>
            <input type="text" name="affiliation" id = "affiliation" value="<?=$personnage['affiliation']?>">
        </div>

        <div class="champs">
            <label for="equipe">Équipe :</label>
            <input type="text" name="equipe" id = "equipe" value="<?=$personnage['equipe']?>">
        </div>

        <div class="champs">
            <label for="famille">Famille :</label>
            <textarea name="famille" id="famille" cols="30" rows="10"><?=$personnage['famille']?></textarea>
        </div>

        <div class="champs">
            <label for="magie">Magie :</label>
            <textarea name="magie" id="magie" cols="30" rows="10"><?=$personnage['magie']?></textarea>
        </div>

        <div class="champs">
            <label for="equipement">Équipement :</label>
            <textarea name="equipement" id="equipement" cols="30" rows="10"><?=$personnage['equipement']?></textarea>
        </div>

        <div class="champs">
            <label for="image">Image :</label>
            <input type="file" name="image" id = "image">
        </div>

        <input type="submit" value="Enregistrer">
        <input type="hidden" name="id_fairy_tail" value="<?=$personnage['id_fairy_tail']?>">

    </form>
    </div>
</div>
<?php
require "../footer.php";