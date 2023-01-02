<?php
$_SESSION['loggedin'] = false;
if ($_SESSION['loggedin']) {
  header('Location: ./?home');
  exit;
}

echo $twig->render('login.html.twig', ['action' => 'login', 'go' => urlencode($_GET['go'] ?? '')]);
