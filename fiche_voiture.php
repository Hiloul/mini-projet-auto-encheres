<link rel="stylesheet" href="style/style.css">



<?php include('navbar.php'); ?> 
<?php include('navbar.php'); ?> 
<?php include('classes/sessionOk.php'); ?> ?> 


  
<?php
require __DIR__."/pdo.php";

//Recuperer toutes les annonces
$query = $pdo->prepare("SELECT * FROM annonces");
$query->execute();
//recupere les données converti dans un tableau associatif
$annonce= $query->fetchALL(PDO::FETCH_ASSOC);
// var_dump($annonce);
?>

<h1>Fiche détails des véhicules</h1>

<?php
foreach($annonce as $key => $value){?>
<section class="bodysite">
<div id="foreach">
<?php
    echo $value['marque']."   ".$value['model']."   ".$value['annee']
    ."   ".$value['couleur']."   ".$value['kilometrage']."   ".$value['carburant']
    ."   ".$value['boitevitesse']."   ".$value['prixdepart']
    ."€  ".$value['datedebut']."   ".$value['datefin']."   ".$value['description'];
}
?>


</div>
</section>



<footer>
    <p>&copy;AutoEnchères</p>
</footer>
