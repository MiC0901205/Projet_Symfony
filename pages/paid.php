<?php

$dbc = $db->prepare('Select idUser, Name, DateDebutLoc, DateFinLoc From location l join boat b on b.id = l.idBoat Where l.id = ?');
$dbc->execute([$_GET['idLoc']]);
$loc = $dbc->fetch();

$userIsAllow = $loc['idUser'] == $_SESSION['uid'];

var_dump($loc['idUser']);
var_dump($_SESSION['uid']);
echo $twig->render('paid.html.twig', array_merge([
    'loc' => $loc,
    'userIsAllow' => $userIsAllow])
);

?>


