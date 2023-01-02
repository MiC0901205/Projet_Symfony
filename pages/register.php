<?php
if ($_SESSION['loggedin']) {
  header('Location: ./?home');
  exit;
}
echo $twig->render('login.html.twig', array_merge([
  'action' => 'register', 
  'go' => urlencode($_GET['go'] ?? '')])
);
