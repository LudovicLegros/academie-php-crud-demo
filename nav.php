<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="bestiaire.php">Bestiaire</a></li>
        <li><a href="#">Codex des sortilèges</a></li>
        <?php if (!isset($_SESSION['userName'])) { ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        <?php } else { ?>
            <li><a href="deconnexion.php">Deconnexion</a></li>
        <?php } ?>
    </ul>
</nav>