<?php

/*  
 * /bdd‐pdo/bdd‐pdo‐select.php 
 * code de connexion à la base de données 
 * + sélection d'enregistrements 
 *  
 * @auteur: Mickaël Pêcheur
 * @date: 12/2022
 */ 

// écrire la requête sql de sélection des produits 
// contenant le mot Lorem dans leur description 
$sql = ' SELECT b.id, Name, Image, Width, Height, Depth, Weight, Price, IdTypeBoat ';
$sql .= ' FROM Boat b ';
$sql .= ' JOIN TypeBoat bt on bt.id = b.idTypeBoat ' ;
// le paramètre est nommée :<nom> 
$sql .= ' Where bt.id = 3' ;

// exécute la requête 
$result = $db->query($sql); 

$Other = [];

while ($row = $result->fetch()) {
    $Other[(int) $row['id']] = [
      'name' => $row['Name'],
      'img' => $row['Image'],
      'width' => $row['Width'],
      'height' => $row['Height'],
      'depth' => $row['Depth'],
      'weight' => $row['Weight'],
      'price' => $row['Price'],
      'idTypeBoat' => $row['IdTypeBoat'],
    ];
}

echo $twig->render('boats.html.twig', array_merge([
    'type' => 'Other', 
    'boats' => $Other]));

echo $twig->render('rent.html.twig', array_merge([
  'type' => 'Other', 
  'boats' => $Other]));
  
?>