
<form action="membre/traitement-authentification.php" method="post">

<div class="membre-form">
    <div>
    <label for="pseudonyme">Pseudonyme :</label>
    <input type="text" name="pseudonyme" id="pseudonyme">
    </div>

    <div>
    <label for="motdepasse">Mot de passe :</label>
    <input type="password" name="motdepasse" id="motdepasse">
    </div>

    <input type="submit" name="membre-authentification" value="Connection">
    <span id="erreur">
        <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
}
?>
    </span>

</div>

</form>
