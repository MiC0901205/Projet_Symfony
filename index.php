<?php
require_once './class/BD.php';

$dbConf = new BD();
$db = $dbConf->DB;

require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, []);

session_start();

$twigDefault = ['connecter' => $_SESSION['loggedin']];

echo $twig->render('main.html.twig', $twigDefault);

if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
}

if (isset($_GET['veil'])) {
    require_once './pages/veil.php';
} elseif (isset($_GET['motor'])) {
    require_once './pages/motor.php';
} elseif (isset($_GET['other'])) {
    require_once './pages/other.php';
} elseif (isset($_GET['login'])) {
    require_once './pages/login.php';
} elseif (isset($_GET['register'])) {
    require_once './pages/register.php';
} elseif (isset($_GET['logout'])) {
    require_once './pages/process_logout.php';
}  elseif (isset($_POST['login_register'])) {
    require_once './pages/process_login_register.php';
} elseif (isset($_GET['boat'])) {
    require_once './pages/boat.php';
} elseif (isset($_GET['rent'])) {
    require_once './pages/rent.php';
} elseif (isset($_GET['paid'])) {
    require_once './pages/paid.php';
} elseif (isset($_GET['account'])) {
    require_once './pages/account.php';
} elseif (isset($_GET['rental'])) {
    require_once './pages/rental.php';
} else {
    require_once './pages/home.php';
}

?>
<link rel="stylesheet" href="./css/boats.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
