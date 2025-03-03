<?php

require "../configuration.php";

if (isset($_POST['inscription-identification']) && !empty($_POST['inscription-identification'])) {
    $filtreMembre = array(
        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'courriel' => FILTER_SANITIZE_EMAIL,
    );

    $_SESSION['membre'] = filter_var_array($_POST, $filtreMembre);

    if (empty($_POST['prenom']) || empty($_POST['nom'])) {
        $_SESSION['erreur'] = "veuillez reseigner tous les champs";
        header('location: inscription-identification.php');
    } else if (empty($_POST['courriel']) || !filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erreur'] = "veuillex reseigner le courriel";
        header('location: inscription-identification.php');
    } else {
        require CHEMIN_ACCESSEUR . "MembreDAO.php";
        $membre = MembreDAO::trouverCourriel($_POST['courriel']);

        if ($membre) {
            $_SESSION['erreur'] = "Ce courriel est déja utilisé";
            header('location: inscription-identification.php');
        }
    }
}

$titre = "Inscription";
require "header.php";
?>

<h2>Inscription d'un membre - identification (2/2)</h2>

<span id="erreur">
        <?php if (!empty($_SESSION['erreur2'])) {
    echo $_SESSION['erreur2'];
    unset($_SESSION['erreur2']);
}
?>
</Span>

<form action="traitement-inscription.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>identité</legend>
    <div>
        <label for="pseudonyme">Pseudonyme :</label>
        <input type="text" name="pseudonyme" id="pseudonyme">
    </div>

    <div>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse" id="motdepasse">
    </div>

    <div>
        <label for="motdepasse2">Mot de passe 2 :</label>
        <input type="password" name="motdepasse2" id="motdepasse2">
    </div>

    <div >
        <label for="image">Avatar :</label>
        <input type="file" name="image" id ="image">
    </div>

</fieldset>
<input type="submit" name="inscription-informations" value="Suivant">
</form>

