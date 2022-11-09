<link rel="stylesheet" href="style/style.css">
<?php include('navbar.php'); ?> 
<?php 
require __DIR__."/pdo.php";
$query = $pdo->prepare("SELECT * FROM `annonces` WHERE id = :id");
$query->bindValue(':id', $_GET["id"],PDO::PARAM_INT);
$query->execute();
$annonce= $query->fetch(PDO::FETCH_ASSOC);
?>


<section class="bodysite">
<div id="foreach">

    <p> <?= $annonce['model']?> </p>
    <p> <?= $annonce['marque']?> </p>
    <p> <?= $annonce['couleur']?> </p>
    <p> <?= $annonce['annee']?> </p>
    <p> <?= $annonce['kilometrage']?> </p>
    <p> <?= $annonce['carburant']?> </p>
    <p> <?= $annonce['boitevitesse']?> </p>
    <p> <?= $annonce['prixdepart']?> </p>
    <p> <?= $annonce['datedebut']?> </p>
    <p> <?= $annonce['datefin']?> </p>
    <div class="btn">
    <button><a href="ajouter_annonce.php">Deposer une annonce</a></button>
    </div>
</div>
</section>