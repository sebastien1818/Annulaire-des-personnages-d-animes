<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title><?=$titre?></title>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul id="menu">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="liste-personnage.php">Panel admin</a></li>
                <li><a href="../index.php">Retor en mode utilisateur</a></li>
                <li id="recherche-rapide">
                    <form action="../traitement-recherche-rapide.php" method="get">
                        <input type="text" name="mot" id="recherche" placeholder= "Recherche">
                        <input type="submit" value="OK">
                    </form>
                </li>
            </ul>
        </nav>
    </header>