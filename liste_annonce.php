<link rel="stylesheet" href="style/style.css">

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
    echo $value['marque']." ".$value['model']." ".$value['annee'].'<section><a href="classes/Encheres.php?id='.$value["id"].'">Afficher</a> <a href="supprimer_annonce.php?id='.$value["id"].'">Supprimer</a><br></section>';
}
?>
</div>



<div class="btn">
<button><a href="ajouter_annonce.php">Deposer une annonce</a></button>
</div>

<footer>
    <p>&copy;AutoEnchères</p>
</footer>
