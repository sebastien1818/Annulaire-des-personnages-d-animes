<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class MembreDAO
{

    public static function trouverMembre($membre)
    {
        $SQL_Authentification = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteAuthentification = BaseDeDonnees::getConnnexion()->prepare($SQL_Authentification);
        $requeteAuthentification->bindParam(':pseudonyme', $membre['pseudonyme'], PDO::PARAM_STR);
        $requeteAuthentification->execute();
        $membreTrouve = $requeteAuthentification->fetch();

        return $membreTrouve;
    }

    public static function lireMembreParPseudonyme($pseudonyme)
    {
        $SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteAuthentification = BaseDeDonnees::getConnnexion()->prepare($SQL_LIRE_MEMBRE);
        $requeteAuthentification->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteAuthentification->execute();
        $membre = $requeteAuthentification->fetch();

        return $membre;
    }

    public static function modifierSecurite($securite)
    {
        print_r($securite['motdepasse']);
        print_r($securite['pseudonyme']);
        $SQL_MODIFIER_MEMBRE = "UPDATE membre SET motdepasse = :motdepasse WHERE pseudonyme = :pseudonyme";
        $requeteModifierMembre = BaseDeDonnees::getConnnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':motdepasse', $securite['motdepasse'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':pseudonyme', $securite['pseudonyme'], PDO::PARAM_STR);
        $requeteModifierMembre->execute();
        $membre = $requeteModifierMembre->fetch();

        return $membre;
    }

    public static function trouverCourriel($utilisateur)
    {
        $TROUVER_COURRIEL = "SELECT id_membre FROM membre WHERE courriel = :courriel";
        $requete = BaseDeDonnees::getConnnexion()->prepare($TROUVER_COURRIEL);
        $requete->bindParam(':courriel', $utilisateur, PDO::PARAM_STR);
        $requete->execute();
        $membre = $requete->fetch();

        return $membre;
    }

    public static function ajouterMembre($nouveauMembre, $image)
    {
        $SQL_AJOUTER_MEMBRE = "INSERT INTO `membre`(`prenom`, `nom`, `pseudonyme`,`motdepasse`,`courriel`,`avatar`) VALUES (:prenom, :nom, :pseudonyme, :motdepasse, :courriel, :avatar)";
        $requeteAjouterMembre = BaseDeDonnees::getConnnexion()->prepare($SQL_AJOUTER_MEMBRE);
        $requeteAjouterMembre->bindParam(':', $nouveauMembre['prenom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':nom', $nouveauMembre['nom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':pseudonyme', $nouveauMembre['pseudonyme'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':motdepasse', $nouveauMembre['motdepasse'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':courriel', $nouveauMembre['courriel'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':avatar', $image, PDO::PARAM_STR);

        $reussiteAjoutMembre = $requeteAjouterMembre->execute();

        return $reussiteAjoutMembre;
    }

    public static function modifierAvatar($personnage, $avatar)
    {
        $SQL_MODIFIER_MEMBRE = "UPDATE membre SET avatar = :avatar WHERE pseudonyme = :pseudonyme";
        $requeteModifierMembre = BaseDeDonnees::getConnnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':pseudonyme', $personnage['pseudonyme'], PDO::PARAM_STR);
        $requeteModifierMembre->execute();
        $membre = $requeteModifierMembre->fetch();

        return $membre;
    }

}
