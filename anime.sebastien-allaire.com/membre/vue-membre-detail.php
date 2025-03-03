<?php

$membre = $_SESSION['membre'];
?>

<div id="boite-membre">
    <div>
        <label>Pseudonyme:</label>
        <span><?=$membre['pseudonyme']?></span>
    </div>

    <div>
        <label>Courriel:</label>
        <span><?=$membre['courriel']?></span>
    </div>

    <div>
        <label>Prénom:</label>
        <span><?=$membre['prenom']?></span>
    </div>

    <div>
        <label>Nom:</label>
        <span><?=$membre['nom']?></span>
    </div>

    <div>
        <label>Avatar:</label>
        <img src="images/<?=$membre['avatar']?>" alt="illustration">
    </div>
</div>