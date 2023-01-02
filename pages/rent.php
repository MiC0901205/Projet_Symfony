<?php 
$minimumDate = date('Y-m-d');

if(isset($_POST['paid'])){
    $dbc = $db->prepare('INSERT INTO location (idBoat, idUser, DateDebutLoc, DateFinLoc) VALUES (?, ?, ?, ?)');
    $dbc->execute([$_GET['id'], $_SESSION['uid'], $_POST['startDate'],  $_POST['endDate']]);
    $idLoc = $db->lastInsertId();
    header('Location: ./?paid&idLoc=' . $idLoc);

} elseif(isset($_POST['startDate'])) {
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startDate2 = strtotime($_POST['startDate']);
    $endDate2 = strtotime($_POST['endDate']);
    $dbr = $db->prepare('SELECT * FROM location WHERE idBoat = ?');
    $dbr->execute([$_GET['id']]);
    $locByBoat = $dbr->fetchAll();

    $valid = true;
    if($locByBoat == false) {
    } else {
        foreach($locByBoat as $loc){
            $dateDebut = strtotime($loc['DateDebutLoc']);
            $dateFin = strtotime($loc['DateFinLoc']);
            if(($startDate2 >= $dateDebut && $startDate2 <= $dateFin) || ($endDate2 >= $dateDebut && $endDate2 <= $dateFin)){
                $valid = false;
                break;
            }
        }
    }
    if($valid){
        $dbc = $db->prepare('SELECT price FROM boat WHERE id = ?');
        $dbc->execute([$_GET['id']]);
        $price = $dbc->fetch();

        function dateDiff($date1, $date2){

            $timestamp = strtotime($date1);
            $timestamp2 = strtotime($date2);
            $diff = abs($timestamp - $timestamp2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
            $retour = array();
        
            $tmp = $diff;
            $retour['second'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['second'])/60 );
            $retour['minute'] = $tmp % 60;
        
            $tmp = floor( ($tmp - $retour['minute'])/60 );
            $retour['hour'] = $tmp % 24;
        
            $tmp = floor( ($tmp - $retour['hour'])/24 );
            $retour['day'] = $tmp;
        
            return $retour['day'];
        }

        $duree = datediff($endDate, $startDate);

        $priceByLoc = $price['price'] * $duree;
        $infos = "The boat is available. It is at the price of $priceByLoc € during the period you selected.";

    } else {
        $priceByLoc = 0;
        $infos = "The boat is not available during this period";
    }
} else {
    $priceByLoc = 0;   
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime($startDate. ' +1 day'));
    $valid = false;
    $infos = "";
}

$dbc = $db->prepare('SELECT * FROM boat WHERE id = ?');
$dbc->execute([$_GET['id']]);
$boat = $dbc->fetch();

echo $twig->render('rent.html.twig', array_merge([
    'boat' => $boat,
    'minimumDate' => $minimumDate,
    'infos' => $infos,
    'valid' => $valid,
    'currentDate' => $startDate,
    'endDate' => $endDate])
);
?>