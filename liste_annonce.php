<link rel="stylesheet" href="style/style.css">

 
<?php include('navbar.php'); ?> 
<?php include('classes/sessionOk.php'); ?>
  
<?php
require __DIR__."/pdo.php";


//Recuperer toutes les annonces
$query = $pdo->prepare("SELECT * FROM annonces");
$query->execute();
//recupere les données converti dans un tableau associatif
$annonce= $query->fetchALL(PDO::FETCH_ASSOC);

?>
<section class="bodysite">
<h1>Sommaire des annonces</h1>
<?php
foreach($annonce as $key => $value){?>

<div id="foreach2">

<?php
    echo $value['marque']." ".$value['model']." ".$value['annee'].'<section class="listeConcat"><a href="liste_enchere.php?id='.$value["id"].'">Afficher</a>    
     <a href="supprimer_annonce.php?id='.$value["id"].'" onclick="return confirm(\'Etes vous sur de vouloir supprimer cette annonce ?\')?true:false;">Supprimer</a><br></section>';
}
?>
<div class="btn">
<button><a href="ajouter_annonce.php">Deposer une annonce</a></button>
</div>

</div>



</section>


<footer>
    <p>&copy;AutoEnchères</p>
</footer>




