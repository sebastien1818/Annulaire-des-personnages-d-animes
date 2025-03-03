<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
$listeParJour = ClicDAO::listerStatsParJours();
$listeParLangue = ClicDAO::listerStatsParLangue();

$joursDeLaSemaines = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

$titre = "Panneau d'adminstration";
require "header.php";
?>

<h1>Stastiques de visite</h1>

<div class="liste-item">
    <table>
        <caption>Tableau stastique de films par jour de jour</caption>
        <tr>
            <th>Jour</th>
            <th>Clic</th>
            <th>Visite</th>
        </tr>
        <?php foreach ($listeParJour as $jourEnregistre) {
    ?>
            <tr>
                <td><?=$joursDeLaSemaines[$jourEnregistre['jour'] - 1]?></td>
                <td><?=$jourEnregistre['clics']?></td>
                <td><?=$jourEnregistre['visites']?></td>
            </tr>


        <?php
}

?>
    </table>

    <div class="chart-container">
        <canvas id="lineChart"></canvas>
    </div>
</div>

<div class="liste-item">
    <table>
        <caption>Tableau stastique de films par langue</caption>
        <tr>
            <th>Langue</th>
            <th>Clic</th>
            <th>Visite</th>
        </tr>
        <?php foreach ($listeParLangue as $langueEnregistre) {
    ?>
            <tr>
                <td><?=$langueEnregistre['langue']?></td>
                <td><?=$langueEnregistre['clics']?></td>
                <td><?=$langueEnregistre['visites']?></td>
            </tr>


        <?php
}

?>
    </table>
    <div class="chart-container">
        <canvas id="lineChart2"></canvas>
    </div>
</div>
<!-- graphique 1! --->
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

</script>

 <script src="js/script-visites.js"></script>
<?php
require "../footer.php";