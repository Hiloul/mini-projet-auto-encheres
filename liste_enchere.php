<link rel="stylesheet" href="style/style.css">
<?php include('navbar.php'); ?>

<?php include('classes/sessionOk.php'); ?> 
<?php 
require __DIR__."/pdo.php";

$query = $pdo->prepare("SELECT * FROM `annonces` WHERE id = :id");
$query->bindValue(':id', $_GET["id"],PDO::PARAM_INT);
$query->execute();
$annonce= $query->fetch(PDO::FETCH_ASSOC);
?>
<?php
    echo $annonce['model'];
    echo $annonce['marque'];
    echo $annonce['couleur'];
    echo $annonce['annee'];
    echo $annonce['kilometrage'];
    echo $annonce['carburant'];
    echo $annonce['boitevitesse'];
    echo $annonce['prixdepart'];
    echo $annonce['datedebut'];
    echo $annonce['datefin'];
?>