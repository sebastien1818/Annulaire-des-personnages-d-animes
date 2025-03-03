<?php

require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$membre = MembreDAO::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);

$titre = "Modification compte";
require "header.php";
?>

<Span>
<div class="hauteur">
    <h2>Mon compte</h2>
    <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
}
?>
</span>

    <form action="traitement-modifier-compte.php" method="post" enctype="multipart/form-data" >
        <fieldset>
            <legend>Sécurité</legend>

            <div>
                <label for="ancienMdp">Mot de passe actuel</label>
                <input type="password" name="ancienMdp" id= "ancienMdp">
            </div>

            <div>
                <label for="motdepasse">Nouveau mot de passe</label>
                <input type="password" name="motdepasse" id= "motdepasse">
            </div>

            <div>
                <label for="motdepasse2">Confirmer le nouveau mot de passe</label>
                <input type="password" name="motdepasse2" id= "motdepasse2">
            </div>

            <input type="submit" class="bouton" name="modification-securite" value="Sauvegarder les chargements">
            <input type="hidden" name="pseudonyme" value="<?=$membre['pseudonyme']?>">

            <Span>
            <?php if (!empty($_SESSION['erreur2'])) {
    echo $_SESSION['erreur2'];
    unset($_SESSION['erreur2']);
}
?>
</span>

        </fieldset>

        <fieldset>
            <legend>Avatar</legend>

            <div>
                <label for="avatar">Avatar :</label>
                <input type="file" name="avatar" id ="avatar">
            </div>

            <input type="submit" class="bouton" name="modification-avatar" value="Sauvegarder les chargements">
            <input type="hidden" name="pseudonyme" value="<?=$membre['pseudonyme']?>">

            <Span>
            <?php if (!empty($_SESSION['erreur3'])) {
    echo $_SESSION['erreur3'];
    unset($_SESSION['erreur3']);
}
?>
</span>

        </fieldset>

?>
</span>

        </fieldset>
    </form>

</div>
<?php
require "../footer.php";