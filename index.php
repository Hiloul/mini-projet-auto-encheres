<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Enchères Auto</title>
</head>
<body>
    
<?php include('navbar.php'); ?> 



<section class="actusite">

<h1>Enchères du moment</h1>

  
<?php
require __DIR__."/pdo.php";

//Recuperer toutes les annonces
$query = $pdo->prepare("SELECT * FROM annonces");
$query->execute();
//recupere les données converti dans un tableau associatif
$annonce= $query->fetchALL(PDO::FETCH_ASSOC);

foreach($annonce as $key => $value){?>

<div id="foreach">
<div id="accueil">
<?php
    echo $value['marque']." ".$value['model']." ".$value['annee']." ".$value['prixdepart'].'€';
}
?>
</div>
</div>






</section>






<!-- <section class="listAuto">
<h2>Véhicule en vente</h2>
<h3>Liste des ventes visibles par les visiteurs</h3>
<h3>Bonus: Filtrer vente en cours et terminée</h3>

<h2>Bonus</h2>
<p>

Pouvoir filtrer sur la page principale, les enchère en cours ou les enchères terminées.
Les utilisateurs connectés devront pouvoir accèder à un espace personnel pour consulter les enchères remportées.
Les utilisateurs connectés devront pouvoir accèder à un espace personnel pour modifier leur profil (nom, prénom, email, mot de passe).
 </p>


</section> -->









<footer>
    <p>&copy;AutoEnchères</p>
</footer>

</body>
</html>