<?php

$titre = "Panneau d'admintrateur";
require "header.php";

?>

<div class="hauteur">
    <h1>Fairy tail</h1>
    <h2>Ajouter un personnage</h2>

    <div id= "liste-film">
    <form action="traitement-ajouter-personnage.php" method="post" enctype="multipart/form-data">
        <div class="champs">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id = "nom">
        </div>

        <div class="champs">
            <label for="race">Race :</label>
            <input type="text" name="race" id = "race">
        </div>

        <div class="champs">
            <label for="genre">Genre :</label>
            <input type="text" name="genre" id = "genre">
        </div>

        <div class="champs">
            <label for="affiliation">Affiliation :</label>
            <input type="text" name="affiliation" id = "affiliation">
        </div>

        <div class="champs">
            <label for="equipe">Équipe :</label>
            <input type="text" name="equipe" id = "equipe">
        </div>

        <div class="champs">
            <label for="famille">Famille :</label>
            <textarea name="famille" id="famille" cols="30" rows="10"></textarea>
        </div>

        <div class="champs">
            <label for="magie">Magie :</label>
            <textarea name="magie" id="magie" cols="30" rows="10"></textarea>
        </div>

        <div class="champs">
            <label for="equipement">Équipement :</label>
            <textarea name="equipement" id="equipement" cols="30" rows="10"></textarea>
        </div>



        <div class="champs">
                <label for="image">Image :</label>
                <input type="file" name="image" id = "image">
            </div>

        <input type="submit" value="Enregistrer">

    </form>
    </div>
</div>
<?php
require "../footer.php";