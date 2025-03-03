<?php
require "configuration.php";
$titre = "Recherche avancée";
require "header.php";
?>

<div class="hauteur">
    <h1>Personnage</h1>
        <section id="contenu">
            <h2>Recherche-avancee</h2>
            <form action="traitement-recherche-avancee.php" method="get">
            <div id="recherche-avancee">
                <label for="recherche-nom">Nom</label>
                <input type="text" name="recherche-nom" id="recherche-nom">
            </div>

            <div>
                <label for="recherche-race">Race</label>
                <input type="text" name="recherche-race" id="recherche-race">
            </div>

            <div>
                <label for="recherche-genre">Genre</label>
                <input type="text" name="recherche-genre" id="recherche-genre">
            </div>

            <div>
                <label for="recherche-affiliation">Affiliation</label>
                <input type="text" name="recherche-affiliation" id="recherche-affiliation">
            </div>

            <input type="submit" value="Recherche">

            </form>

        </section>
</div>
