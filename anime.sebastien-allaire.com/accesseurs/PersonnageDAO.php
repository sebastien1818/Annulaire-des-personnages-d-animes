<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class PersonnageDAO
{
    public static function listerPersonnages()
    {
        $MESSAGE_SQL_LISTE_Personnages = "SELECT `id`, `nom`, `race`, `genre`, `affiliation`, `image` FROM `personnages`;";

        $requeteListePersonnages = BaseDeDonnees::getConnnexion()->prepare($MESSAGE_SQL_LISTE_Personnages);

        $requeteListePersonnages->execute();
        $listePersonnages = $requeteListePersonnages->fetchAll();

        return $listePersonnages;
    }

    public static function lirePersonnages($idPersonnage)
    {
        $MESSAGE_SQL_PERSONNAGE = "SELECT * FROM personnages  WHERE id = :id";
        $requetePersonnages = BaseDeDonnees::getConnnexion()->prepare($MESSAGE_SQL_PERSONNAGE);
        $requetePersonnages->bindParam(':id', $idPersonnage, PDO::PARAM_INT);
        $requetePersonnages->execute();
        $personnage = $requetePersonnages->fetch();

        return $personnage;
    }

    public static function ajouterPersonnage($personnage, $image)
    {
        $SQL_AJOUTER_PERSONNAGE = "INSERT INTO `personnages`(`nom`, `race`, `genre`,`affiliation`,`equipe`,`famille`,`magie`,`equipement`,`image`) VALUES (:nom, :race, :genre, :affiliation, :equipe, :famille, :magie, :equipement, :image)";
        $requeteAjouterPersonnage = BaseDeDonnees::getConnnexion()->prepare($SQL_AJOUTER_PERSONNAGE);

        $requeteAjouterPersonnage->bindParam(':nom', $personnage['nom'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':race', $personnage['race'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':genre', $personnage['genre'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':affiliation', $personnage['affiliation'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':equipe', $personnage['equipe'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':famille', $personnage['famille'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':magie', $personnage['magie'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':equipement', $personnage['equipement'], PDO::PARAM_STR);
        $requeteAjouterPersonnage->bindParam(':image', $image, PDO::PARAM_STR);

        $reussiteAjout = $requeteAjouterPersonnage->execute();

        return $reussiteAjout;
    }

    public static function modifierPersonnage($personnage, $image)
    {
        $SQL_MODIFIER_PERSONNAGE = "UPDATE `personnages` SET `nom`=:nom,`race`=:race,`genre`=:genre,`affiliation`=:affiliation,`equipe`=:equipe,`famille`=:famille,`magie`=:magie,`equipement`=:equipement,`image`=:image WHERE id = :id";
        $requeteModifierPersonnage = BaseDeDonnees::getConnnexion()->prepare($SQL_MODIFIER_PERSONNAGE);

        $requeteModifierPersonnage->bindParam(':id', $personnage['id_fairy_tail'], PDO::PARAM_INT);
        $requeteModifierPersonnage->bindParam(':nom', $personnage['nom'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':race', $personnage['race'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':genre', $personnage['genre'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':affiliation', $personnage['affiliation'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':equipe', $personnage['equipe'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':famille', $personnage['famille'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':magie', $personnage['magie'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':equipement', $personnage['equipement'], PDO::PARAM_STR);
        $requeteModifierPersonnage->bindParam(':image', $image, PDO::PARAM_STR);

        $reussiteModification = $requeteModifierPersonnage->execute();

        return $reussiteModification;
    }

    public static function supprimerPersonnage($idPersonnage)
    {
        $SQL_EFFACER_PERSONNAGE = "DELETE FROM `personnages` WHERE id = :id";
        $requeteEffacerPersonnage = BaseDeDonnees::getConnnexion()->prepare($SQL_EFFACER_PERSONNAGE);

        $requeteEffacerPersonnage->bindParam(':id', $idPersonnage, PDO::PARAM_INT);

        $reussiteSuppression = $requeteEffacerPersonnage->execute();

        return $reussiteSuppression;
    }

    public static function rechercheRapide($mot)
    {
        $SQL_RECHERCHE_RAPIDE = "SELECT * FROM `personnages` WHERE nom LIKE '%$mot%' OR race LIKE '%$mot%' OR genre LIKE '%$mot%' OR affiliation LIKE '%$mot%'";

        $requeteRechercheRapide = BaseDeDonnees::getConnnexion()->prepare($SQL_RECHERCHE_RAPIDE);
        $requeteRechercheRapide->execute();
        $resultats = $requeteRechercheRapide->fetchAll();

        return $resultats;
    }

    public static function rechercheAvancee($nomRecherche, $raceRecherche, $genreRecherche, $affiliationRecherche)
    {
        $SQL_RECHERCHE_AVANCEE = "SELECT * FROM `personnages` WHERE 1 = 1";

        if (!empty($nomRecherche)) {
            $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND nom LIKE '%$nomRecherche%'";
        }

        if (!empty($raceRecherche)) {
            $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND race LIKE '%$raceRecherche%'";
        }

        if (!empty($genreRecherche)) {
            $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND genre LIKE '%$genreRecherche%'";
        }

        if (!empty($affiliationRecherche)) {
            $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND affiliation LIKE '%$affiliationRecherche%'";
        }

        $requeteRecherche = BaseDeDonnees::getConnnexion()->prepare($SQL_RECHERCHE_AVANCEE);
        $requeteRecherche->execute();
        $resultats = $requeteRecherche->fetchAll();

        return $resultats;
    }

    public static function listerCategories()
    {
        $MESSAGE_LISTER_CATEOGORIES = "SELECT race, COUNt(*) as nombre, AVG(age) as age_moyenne, SUM(age) as age_totales,MAX(age) as age_maximum, MIN(age) as age_mininum FROM personnages GROUP By race";

        $reqeteCategories = BaseDeDonnees::getConnnexion()->prepare($MESSAGE_LISTER_CATEOGORIES);
        $reqeteCategories->execute();
        $categories = $reqeteCategories->fetchAll();
        return $categories;
    }

    public static function calculerContenu()
    {
        $MESSAGE_CALCULER_CONTENU = "SELECT AVG(age) as moyenne, STDDEV(age) as ecart_type FROM personnages";
        $requetePageContenu = BaseDeDonnees::getConnnexion()->prepare($MESSAGE_CALCULER_CONTENU);
        $requetePageContenu->execute();
        $contenu = $requetePageContenu->fetchAll();
        return $contenu;
    }

    public static function imageRandom()
    {
        $MESSAGE_IMAGE_RANDOM = "SELECT id,nom,image FROM personnages ORDER BY RAND() LIMIT 1";
        $requeteImageRandom = BaseDeDonnees::getConnnexion()->prepare($MESSAGE_IMAGE_RANDOM);
        $requeteImageRandom->execute();
        $contenu = $requeteImageRandom->fetch();
        return $contenu;
    }

}
