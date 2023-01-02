<?php

$dbc = $db->query('SELECT * FROM typeboat');
$types = $dbc->fetchAll();

if(isset($_POST['nameBoat'])){
    $dbc = $db->prepare('Select b.* FROM boat b join typeboat t on t.id = b.idTypeBoat WHERE UPPER(name) LIKE ? and price BETWEEN ? and ? and t.id = ?');
    $name = '%'.strtoupper($_POST['nameBoat']).'%';
    if(empty($_POST['min_price'])){
        $_POST['min_price'] = 0;
    }
    if(empty($_POST['max_price'])){
        $_POST['max_price'] = PHP_INT_MAX;
    }
    $dbc->execute([$name, $_POST['min_price'], $_POST['max_price'], $_POST['typeBoat']]);

    $Boats = [];

    while ($row = $dbc->fetch()) {
        $Boats[(int) $row['id']] = [
        'name' => $row['Name'],
        'img' => $row['Image'],
        'width' => $row['Width'],
        'height' => $row['Height'],
        'depth' => $row['Depth'],
        'weight' => $row['Weight'],
        'price' => $row['Price'],
        ];
    }

    echo $twig->render('boats.html.twig', array_merge([
        'type' => 'Search', 
        'boats' => $Boats]));

} else {
    echo $twig->render('home.html.twig', array_merge([
        'types' => $types])
    );
}


?>