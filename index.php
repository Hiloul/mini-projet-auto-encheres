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

    <link rel="stylesheet" href="style/style.css">
    <title>Enchères Auto</title>
</head>
<body>
    
<?php include('navbar.php'); ?> 
<?php include('classes/sessionOk.php'); ?>





<section class="actusite">
    
    <h1>Les enchères du moment</h1>

  
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





<footer>
    <p>&copy;AutoEnchères</p>
</footer>

</body>
</html>