<?php

require "../configuration.php";

$titre = "Inscription";
require "header.php";
?>

<h2>Inscription d'un membre - identification (1/2)</h2>

<span id="erreur">
        <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
}
?>
</Span>

<form action="inscription-informations.php" method="post">
<fieldset>
    <legend>identité</legend>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom">
    </div>

    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
    </div>

    <div>
        <label for="courriel">Courriel :</label>
        <input type="text" name="courriel" id="courriel">
    </div>

</fieldset>
<input type="submit" name="inscription-identification" value="Suivant">
</form>
