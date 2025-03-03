<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";
$listeCategorie = PersonnageDAO::listerCategories();
$contenuImage = PersonnageDAO::imageRandom();
$listeParJour = ClicDAO::listerStatsParJours();
$listeParLangue = ClicDAO::listerStatsParLangue();

$joursDeLaSemaines = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

$titre = "Panneau d'adminstration";
require "header.php";
?>
<h1>Dashboard</h1>

<div class="liste-articles">
        <div class="article">
            <h1>Diagramme visite par jour</h1>

            <canvas id="lineChart"></canvas>
            <a href="visites-stats.php" class="bouton">En savoir plus</a>
        </div>

            <!--carte2-->
            <div class="article">
                <h1>Diagramme visite par langue</h1>

                <canvas id="lineChart2"></canvas>
                <a href="visites-stats.php" class="bouton">En savoir plus</a>
            </div>

            <!--carte3-->
                <div class="article">
                    <h1>Diagramme categorie</h1>

                    <canvas id="lineChart3"></canvas>
                    <a href="contenu-stats.php" class="bouton">En savoir plus</a>
                </div>

             <!--carte4-->
             <div class="article">
                    <h1>Liste personnage</h1>

                    <p>Voici une liste des personnages modifiables
                    </p>
                    <a href="liste-personnage.php" class="bouton">Cliquez ici</a>
                </div>

                 <!--carte5-->
                 <div class="article">
                    <h1>Personnage Random :<?=$contenuImage['nom']?></h1>

                    <img src= "../images/<?=$contenuImage['image']?>"alt="image" id="image">

                    </p>
                    <a href="../personnage.php?extra=<?=$contenuImage['id_fairy_tail']?>" class="bouton">En savoir plus</a>
                </div>

                 <!--carte6-->
                 <div class="article">
                    <h1>Citation de Fairy Tail</h1>

                    <p>Même si je ne te vois pas, même si tu es loin de moi, je serais toujours avec toi et je te protègerai, je t'en fais la promesse
                    </p>
                </div>

    </div>

    <script>
<?php
$listeDeJour = [];
foreach ($listeParJour as $jour) {
    $listeDeJour[] = $joursDeLaSemaines[$jour['jour'] - 1];
    $nombreParJour[] = $jour['visites'];
}
?>
let labelLine = <?=json_encode($listeDeJour)?>;
let dataLine = <?=json_encode($nombreParJour)?>;

//graphique 2
<?php
$listeDeLangue = [];
foreach ($listeParLangue as $langue) {
    $listeDeLangue[] = $langue['langue'];
    $nombreParLangue[] = $langue['visites'];
}
?>
let labelLine2 = <?=json_encode($listeDeLangue)?>;
let dataLine2 = <?=json_encode($nombreParLangue)?>;

<?php
$listeDeRace = [];
foreach ($listeCategorie as $race) {
    $listeDeRace[] = $race['race'];
    $nombreParRace[] = $race['nombre'];
}
?>
let labelLine3 = <?=json_encode($listeDeRace)?>;
let dataLine3 = <?=json_encode($nombreParRace)?>;

</script>

 <script src="js/script-index.js"></script>

<?php
require "../footer.php";
