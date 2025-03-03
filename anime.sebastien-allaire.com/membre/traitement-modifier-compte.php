<?php

require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

if (isset($_POST['modification-securite']) && !empty($_POST['modification-securite'])) {
    $filtreMembre = array(
        'ancienMDP' => FILTER_SANITIZE_ENCODED,
        'motdepasse' => FILTER_SANITIZE_ENCODED,
        'motdepasse2' => FILTER_SANITIZE_ENCODED,
        'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
    );
    $securite = filter_input_array(INPUT_POST, $filtreMembre);

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreur2'] = "Vos mots de passe doivent etre identiques";
        header('location: modifier-compte.php');
    }

    $ancienMdp = $_POST['ancienMdp'];
    $membreTrouve = MembreDAO::trouverMembre($_SESSION['membre']);

    if (password_verify($securite['motdepasse'], $membreTrouve['motdepasse'])) {
        $_SESSION['membre'] = array();
        $_SESSION['membre']['pseudonyme'] = $membreTrouve['pseudonyme'];
        $_SESSION['membre']['avatar'] = $membreTrouve['avatar'];
    } else {
        $_SESSION['erreur'] = "Mot de passe invalide";
        header('location: modifier-compte.php');
    }

    if (empty($_SESSION['erreur2'])) {
        $_SESSION['membre']['motdepasse'] = $securite['motdepasse'];
        $_SESSION['membre']['pseudonyme'] = $securite['pseudonyme'];

        $securite['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
        $requeteModification = MembreDAO::modifierSecurite($securite);
        header('location: ../membre.php');
    }

}if (isset($_POST['modification-avatar']) && !empty($_POST['modification-avatar'])) {
    $filtreMembre = array(
        'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
    );
    $personne = filter_input_array(INPUT_POST, $filtreMembre);

    $avatar = $_FILES['avatar']['name'];

    $repertoire_illustration = "../images/";

    $fichierDestination = $repertoire_illustration . basename($_FILES['avatar']['name']);
    $fichierSource = $_FILES['avatar']['tmp_name'];
    $extensionFicher = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

    if ($_FILES['avatar']['size'] > 5000000) {
        $_SESSION['erreur3'] = "L'image est trop volumineuse";
        header('location: modifier-compte.php');
    } else if ($extensionFicher != "jpg" && $extensionFicher != "png" && $extensionFicher != "svg") {
        $_SESSION['erreur3'] = "Veuillez ajouter un format d'image valide";
        header('location: modifier-compte.php');
    } else if (move_uploaded_file($fichierSource, $fichierDestination)) {
        if (empty($_SESSION['erreur3'])) {
            $_SESSION['membre']['avatar'] = $avatar;
            $_SESSION['membre']['pseudonyme'] = $personne['pseudonyme'];

            $requeteModification = MembreDAO::modifierAvatar($personne, $avatar);
            header('location: ../membre.php');
        }
    }
}
