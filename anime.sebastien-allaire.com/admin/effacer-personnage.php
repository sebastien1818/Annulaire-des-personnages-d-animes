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
    <h2>Effacer un personnage</h2>
    <p> Vous êtes sur de vouloir supprimer le personnage <?=$personnage['nom']?> </p>

    <form action="index.php">
        <input type="submit" value="Non">
    </form>

    <form action="traitement-effacer-personnage.php" method="post">
        <input type="submit" value="Oui">
        <input type="hidden" name="id_fairy_tail" value="<?=$personnage['id_fairy_tail']?>">
    </form>

</div>
<?php
require "../footer.php";