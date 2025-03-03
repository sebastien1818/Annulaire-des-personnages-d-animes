<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";

$estSurServeurTiweb = strpos($adresseCourante, 'tiweb.cgmatane.qc.ca') !== false ? true : false;

if ($estSurServeurTiweb) {
    $utilisateur = 'tiweb_allaires';
    $motdepasse = 'HOL9xPoi5F';
    $hote = 'localhost';
    $base = 'tiweb_allaires';
} else {
    $utilisateur = 'root';
    $motdepasse = 'AGC5bheo7cY8MwYWRHF0';
    $hote = 'localhost';
    $base = 'anime';
}

$dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
try {

    $basededonnees = new PDO($dsn, $utilisateur, $motdepasse);
    $basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $basededonnees->exec('SET CHARACTER SET UTF8');
} catch (PDOException $e) {
    echo ('Échec de la connexion : ' . $e->getMessage());
}
return $basededonnees;
