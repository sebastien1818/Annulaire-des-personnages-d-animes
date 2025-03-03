<?php

require "../configuration.php";

if (isset($_SESSION['membre']['pseudonyme'])) {
    //on détruites les variables de la session
    session_unset();
    //on destruites la session
    session_destroy();

    header('location: ../membre.php');
} else {
    echo "Vous n'étez pas connecter";
}
