<?php

$dbc = $db->prepare('Select Name, Image, DateDebutLoc, DateFinLoc From location l join boat b on b.id = l.idBoat Where idUser = ?');
$dbc->execute([$_SESSION['uid']]);
$locs = $dbc->fetchAll();

echo $twig->render('rental.html.twig', array_merge([
    'locs' => $locs])
);

?>