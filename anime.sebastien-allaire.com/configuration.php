<?php

session_start();

$adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";

$estSurServeurTiweb = strpos($adresseCourante, 'tiweb.cgmatane.qc.ca') !== false ? true : false;

if ($estSurServeurTiweb) {
    define("CHEMIN_ACCESSEUR", $_SERVER["DOCUMENT_ROOT"] . "/accesseurs/");

} else {
    define("CHEMIN_ACCESSEUR", $_SERVER["DOCUMENT_ROOT"] . "/accesseurs/");
}
