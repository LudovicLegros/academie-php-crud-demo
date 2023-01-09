<?php
include_once('environnement.php');

$request = $bdd->query('SELECT * 
                        FROM creature');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Academie</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main>
        <h1>Référencement du bestiaire</h1>
        <a class="btn btn-add" href="creature_creation.php">Ajouter une créature</a>
        <!-- Gestion des messages de success -->
        <?php
        if (isset($_GET['success'])) {
            $success = $_GET['success'];
            switch ($success) {
                case 1:
                    echo "<p class='success'>Votre créature a bien été ajouté </p>";
                    break;
                case 2:
                    echo "<p class='success'>Votre créature a bien été modifié </p>";
                    break;
                case 3:
                    echo "<p class='success'>Votre créature a bien été supprimé</p>";
                    break;
            }
        }
        ?>

        <h2>Liste des créatures :</h2>
        <section id="creature_list">
            <!-- BOUCLE POUR RECUPERATION DE LA REQUETE -->
            <?php while ($creature = $request->fetch()) { ?>
                <article>
                    <img src="assets/image/creatures/<?= $creature['image']; ?>" alt="image de <?= $creature['nom']; ?>">
                    <h3> <?= $creature['nom']; ?> </h3>
                    <p> <?= $creature['description']; ?> </p>
                    <a class="btn btn-modif" href="<?= 'creature_modification.php?id=' . $creature['id']; ?>">modifier</a>
                    <a class="btn btn-suppr" href="<?= 'creature_suppression.php?id=' . $creature['id']; ?>">supprimer</a>
                </article>
            <?php } ?>
        </section>
    </main>
</body>

</html>