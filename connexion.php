<?php
include_once('environnement.php');

if (isset($_POST['name']) && (isset($_POST['password']))) {
    $username = htmlspecialchars(trim(strtolower($_POST['name'])));
    $password = htmlspecialchars(trim($_POST['password']));
    $passwordCrypt = sha1(sha1('123' . $password . 'kpkoazf1516'));

    $request = $bdd->prepare('  INSERT INTO users(username,password)
                                VALUES(?,?)');

    $request->execute(array($username, $passwordCrypt));
    header('Location:index.php?successconnect=1');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Connexion</title>
</head>

<body>
    <?php include_once('nav.php'); ?>
    <main>
        <form action="inscription.php" method="POST">
            <label for="name">Votre nom:</label>
            <input type="text" name="name" id="name">
            <label for="password">Votre mot de passe:</label>
            <input type="password" name="password" id="password">
            <button>Valider</button>
        </form>
    </main>
</body>

</html>