<?php
include_once('environnement.php');

//REQUETE SELECT POUR REMPLISSAGE AUTO
$articleId = $_GET['id'];

$rqSelect = $bdd->prepare('SELECT *
                             FROM creature
                             WHERE id = ?');
$rqSelect->execute(array($articleId));


if (isset($_POST['name']) && isset($_POST['description'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);

    $request = $bdd->prepare('UPDATE creature
                              SET nom = :nom, description = :description
                              WHERE id = :id');

    $request->execute(array(
        'nom'           => $name,
        'description'   => $description,
        'id'            => $articleId
    ));
    header('Location: bestiaire.php?success=2');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/image/livre-de-sortileges.png">
    <title>modification de créature</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main>
        <h1>Modification de la créature</h1>

        <!--Formulaire de modification-->
        <form action="creature_modification.php<?= '?id=' . $articleId ?>" method="POST">
            <?php while ($value = $rqSelect->fetch()) : ?>
                <label for="name">Modifier le nom :</label>
                <input type="text" id="name" name="name" value="<?= $value['nom'] ?>">

                <label for="description">Modifier la description :</label>
                <textarea name="description" id="description" cols=" 30" rows="10"><?= $value['description'] ?></textarea>
            <?php endwhile ?>
            <button>Modifier</button>
        </form>
    </main>
</body>

</html>