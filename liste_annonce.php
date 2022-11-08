<link rel="stylesheet" href="style/style.css">
<nav>
<a href="http://localhost/php/mini-projet-auto-encheres//index.php"><img src="img/logo1.png" id="logo" alt=""></a>
<a href="liste_annonce.php">Enchères</a>
<a href="classes/Articles.php">Articles</a>
<a href="classes/Ventes.php">Vendre</a>
</nav>   
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
    echo $value['marque']." ".$value['model']." ".$value['annee'].'<section><a href="ajouter_annonce.php?id='.$value["id"].'">Afficher</a> <a href="supprimer_annonce.php?id='.$value["id"].'">Supprimer</a><br></section>';
}
?>
</div>



<div class="btn">
<button><a href="ajouter_annonce.php">Deposer une annonce</a></button>
</div>

<footer>
    <p>&copy;AutoEnchères</p>
</footer>
