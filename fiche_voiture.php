<link rel="stylesheet" href="style/style.css">

<h1>Fiche Détails</h1>

<?php include('navbar.php'); ?> 
  
<?php
require __DIR__."/pdo.php";

//Recuperer toutes les annonces
$query = $pdo->prepare("SELECT * FROM annonces");
$query->execute();
//recupere les données converti dans un tableau associatif
$annonce= $query->fetchALL(PDO::FETCH_ASSOC);
// var_dump($annonce);

foreach($annonce as $key => $value){?>

<div id="foreach">

<?php
    echo $value['marque']."   ".$value['model']."   ".$value['annee']
    ."   ".$value['couleur']."   ".$value['kilometrage']."   ".$value['carburant']
    ."   ".$value['boitevitesse']."   ".$value['prixdepart']
    ."€  ".$value['datedebut']."   ".$value['datefin']."   ".$value['description'];
}
?>


</div>




<footer>
    <p>&copy;AutoEnchères</p>
</footer>
