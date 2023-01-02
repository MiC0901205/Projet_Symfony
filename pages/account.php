<?php

if (isset($_POST['firstname'])){
    $dbc = $db->prepare('UPDATE user SET FirstName = ?, LastName = ?, Adress = ?, Zipcode = ?, City = ?, Phone = ?, Mail = ? WHERE id = ?');
    $dbc->execute([$_POST['firstname'], $_POST['lastname'], $_POST['adress'],  $_POST['zipcode'], $_POST['city'], $_POST['phone'], $_POST['email'], $_SESSION['uid']]);
}

$dbc = $db->prepare('SELECT * FROM user WHERE id = ?');
$dbc->execute([$_SESSION['uid']]);
$user = $dbc->fetch();

echo $twig->render('account.html.twig', array_merge([
    'user' => $user])
);

?>