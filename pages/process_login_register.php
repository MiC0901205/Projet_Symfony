<?php
if ($_SESSION['loggedin']) {
  header('Location: ./?home');
  exit;
}

if (empty($_POST['email'])) {
  die('TODO: error page, empty email');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  die('TODO: error page, invalid email');
}

if (!isset($_POST['pass']) || empty($_POST['pass'])) {
  header('Location: ./?login');
  exit;
}
if (isset($_POST['pass2']) && empty($_POST['pass2'])) {
  header('Location: ./?register');
  exit;
}
$dbr = $db->prepare('SELECT * FROM user WHERE Mail = ? LIMIT 1');
$dbr->execute([$_POST['email']]);
$user = $dbr->fetch();
if (isset($_POST['pass2'])) {
  if ($user) {
    echo $twig->render('login.html.twig', ['errorDuplicate' => 'Email déjà existant', 'go' => urlencode($_GET['go'] ?? '')]);
    die('TODO: error page, user already exists');
  }

  if ($_POST['pass'] !== $_POST['pass2']) {
    die('TODO: error page, password mismatch');
  }


  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $dbc = $db->prepare('INSERT INTO user (FirstName, LastName, Adress, Zipcode, City, Phone, Mail, Pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
  $dbc->execute([$_POST['firstname'], $_POST['lastname'], $_POST['adress'],  $_POST['zipcode'], $_POST['city'], $_POST['phone'], $_POST['email'], $pass]);
  print_r([$_POST['firstname'], $_POST['lastname'], $_POST['adress'],  $_POST['zipcode'], $_POST['city'], $_POST['phone'], $_POST['email'], $pass]);
  echo 'INSERT INTO user (FirstName, LastName, Adress, Zipcode, City, Phone, Mail, Pass) VALUES ("'.$_POST['firstname'].'", "'.$_POST['lastname'].'", "'.$_POST['adress'].'", "'.$_POST['zipcode'].'", "'.$_POST['city'].'", "'.$_POST['phone'].'", "'.$_POST['email'].'", "'.$pass.'")';
  $_SESSION['loggedin'] = true;
  $_SESSION['Mail'] = $_POST['email'];
  $_SESSION['uid'] = $db->lastInsertId();
} else {
  if (!$user) {
    die('TODO: error page, user doesn\'t exists');
  }

  if (!password_verify($_POST['pass'], $user['Pass'])) {
    die('TODO: error page, wrong password');
  }

  $_SESSION['city'] = $user['City'];
  $_SESSION['zipcode'] = $user['Zipcode'];
  $_SESSION['firstName'] = $user['FirstName'];
  $_SESSION['lastName'] = $user['LastName'];
  $_SESSION['adress'] = $user['Adress'];
  $_SESSION['phone'] = $user['Phone'];
  $_SESSION['loggedin'] = true;
  $_SESSION['email'] = $user['Mail'];
  $_SESSION['uid'] = (int) $user['id'];

}

// TODO: save future changes of $_SESSION to the db
if (isset($_GET['go']) && !empty($_GET['go'])) {
  header('Location: ./?' . $_GET['go']);
} else {
  header('Location: ./?home'); // ?commandes // TODO: liste de commandes (pas de détail, juste la date et somme de chaque batch)
}