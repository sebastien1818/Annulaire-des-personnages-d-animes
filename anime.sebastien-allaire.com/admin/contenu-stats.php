<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "PersonnageDAO.php";
$listeCategorie = PersonnageDAO::listerCategories();
$contenus = PersonnageDAO::calculerContenu();

$titre = "Panneau d'adminstration";
require "header.php";
?>

<h1>Stastiques de contenu</h1>

<div class="liste-item">
    <table>
        <caption>Tableau stastique de personnage par race</caption>
        <tr>
            <th>Race</th>
            <th>Nombre</th>
            <th>Age totales</th>
            <th>Age maximales</th>
            <th>Age minimales</th>
            <th>Age moyenne</th>
        </tr>
        <?php foreach ($listeCategorie as $categorie) {
    ?>
            <tr>
                <td><?=$categorie['race']?></td>
                <td><?=$categorie['nombre']?></td>
                <td><?=$categorie['age_totales']?></td>
                <td><?=$categorie['age_maximum']?></td>
                <td><?=$categorie['age_mininum']?></td>
                <td><?=floor($categorie['age_moyenne'])?></td>
            </tr>


        <?php
}
?>
    </table>

    <div class="chart-container">
        <canvas id="lineChart"></canvas>
    </div>

    <?php
foreach ($contenus as $contenu) {
    ?>
            <p>Age moyenne des personnages:
            <?=floor($contenu['moyenne']) . " ans"?></p>

            <p>Écart-type:
            <?=round($contenu['ecart_type'], 1)?></p>

            <?php
}
?>
</div>

<script>
<?php
$listeDeRace = [];
foreach ($listeCategorie as $race) {
    $listeDeRace[] = $race['race'];
    $nombreParRace[] = $race['nombre'];
}
?>
let labelLine = <?=json_encode($listeDeRace)?>;
let dataLine = <?=json_encode($nombreParRace)?>;

</script>
 <script src="js/script-contenu.js"></script>

<?php
require "../footer.php";
