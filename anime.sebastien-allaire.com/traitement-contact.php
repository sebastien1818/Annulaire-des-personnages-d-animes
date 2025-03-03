<?php
if (isset($_POST['valider'])) {
    if ((empty($_POST['nom'])) || (empty($_POST['email'])) || (empty($_POST['message']))) {
        echo "Veuillez tous les champs";
    } else {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $entente = 'MIME-Version: 1.0' . "\r\n";
        $entente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entente .= 'From: tiweb@cpanel.cgmatane.qc.ca' . "\r\n";
        $entente .= 'Reply-to' . $email;

        $contenu = '<h1> Message envoyé depuis page contact</h1>
        <p><strong>Email : </strong>' . $email . '<br/>
        <strong>Message : </strong>' . htmlspecialchars($message) . '</p>';

        $retour = mail('sebastien.allaire05@gmail.com', 'Envoi depuis page contact', $contenu, $entente);

        if ($retour) {
            echo "<p> votre message a bien envoyé";
        }
    }
}
