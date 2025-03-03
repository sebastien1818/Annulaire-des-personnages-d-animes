<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title><?=$titre?></title>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul id="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="liste-personnage.php">Personnages</a></li>
                <li id="recherche-rapide">
                    <form action="traitement-recherche-rapide.php" method="get">
                        <input type="text" name="mot" id="recherche" placeholder= "Recherche">
                        <input type="submit" value="OK">
                    </form>
                </li>
                <li><a href="membre.php">Membre</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="recherche-avancee.php">Recherche</a></li>

                <?php
if (!empty($_SESSION['membre'])) {
    ?>
                    <li><a href="membre.php"><?=$_SESSION['membre']['pseudonyme']?></a></li>
                    <li><img src="images/<?=$_SESSION['membre']['avatar']?>" class="avatar" alt="illustration"></li>
                    <?php
}
?>

            </ul>
        </nav>
    </header>
