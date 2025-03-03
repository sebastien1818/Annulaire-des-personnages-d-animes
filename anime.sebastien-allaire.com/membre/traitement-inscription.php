<?php

require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

if (isset($_POST['inscription-informations']) && !empty($_POST['inscription-informations'])) {
    $filtreMembre = array(
        'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
        'motdepasse' => FILTER_SANITIZE_ENCODED,
        'motdepasse2' => FILTER_SANITIZE_ENCODED,
    );
    $nouveauMembre = filter_input_array(INPUT_POST, $filtreMembre);

    $image = $_FILES['image']['name'];

    $repertoire_illustration = "../images/";

    $fichierDestination = $repertoire_illustration . basename($_FILES['image']['name']);
    $fichierSource = $_FILES['image']['tmp_name'];
    $extensionFicher = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreur2'] = "Vos mots de passe doivent etre identiques";
        header('location: inscription-informations.php');
    }

    if (empty($_POST['pseudonyme']) || !preg_match('/^[A-Za-z0-9]+([A-Za-z0-9]*|[._-]?[A-Za-z0-9]+)*$/', $_POST['pseudonyme'])) {
        $_SESSION['erreur2'] = "Vos pseudonyme n'est pas valide";
        header('location: inscription-informations.php');
    } else {
        $membre = MembreDAO::lireMembreParPseudonyme($_POST['pseudonyme']);
    }

    if ($membre) {
        $_SESSION['erreur2'] = "Votre pseudo est déja utilisé";
        header('location: inscription-informations.php');
    }

    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['erreur2'] = "L'image est trop volumineuse";
        header('location: inscription-informations.php');

    } else if ($extensionFicher != "jpg" && $extensionFicher != "png" && $extensionFicher != "svg") {
        $_SESSION['erreur2'] = "Veuillez ajouter un format d'image valide";
        header('location: inscription-informations.php');
    } else {

        if (move_uploaded_file($fichierSource, $fichierDestination)) {

            if (empty($_SESSION['erreur2'])) {
                $_SESSION['membre']['pseudonyme'] = $nouveauMembre['pseudonyme'];

                $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

                $reussiteInscription = MembreDAO::ajouterMembre($_SESSION['membre'], $image);

                if ($reussiteInscription) {
                    header('location: ../membre.php');
                }
            }
        }

    }
}
