<?php

if(!isset($_GET['id'])){
    header('Location: ./?home');
}

$dbc = $db->prepare('SELECT * FROM boat WHERE id = ?');
$dbc->execute([$_GET['id']]);
$boat = $dbc->fetch();

echo $twig->render('boat.html.twig', array_merge([
    'boat' => $boat])
  );