<?php
include('environnement.php');

$id = htmlspecialchars($_GET['id']);

$request = $bdd->prepare('DELETE FROM creature
                          WHERE id=?');

$request->execute([$id]);
header('Location: bestiaire.php?success=3');
exit();
