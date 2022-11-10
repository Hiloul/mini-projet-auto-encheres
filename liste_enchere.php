<link rel="stylesheet" href="style/style.css">
<?php include('navbar.php'); ?>

<?php include('classes/sessionOk.php'); ?> 
<?php 
require __DIR__."/pdo.php";

// var_dump($_SESSION);
if(isset($_POST["submitEncheres"])) {

    //$query3= $pdo->prepare();

$query3 = $pdo->prepare ("SELECT MAX(offre) as max FROM enchere JOIN utilisateur ON enchere.utilisateur_id = utilisateur.id WHERE annonce_id = :id") ;
$query3->bindValue(":id",$_GET["id"],PDO::PARAM_INT);
$query3->execute();
$gagnant= $query3->fetch(PDO::FETCH_ASSOC);
// var_dump($gagnant);
// var_dump($_POST["offre"]);
    if ($_POST["offre"] > $gagnant['max']) {
        echo "prix correct";
        $query = $pdo->prepare("INSERT INTO `enchere`(`offre`, `date`, `utilisateur_id`, `annonce_id`) VALUES (:offre, :date, :utilisateur_id, :annonce_id)");
        $query->bindValue(':offre', $_POST["offre"],PDO::PARAM_INT);
        $query->bindValue(':date', date("Y-m-d"),PDO::PARAM_STR);
        $query->bindValue(':utilisateur_id', $_SESSION["id_utilisateur"],PDO::PARAM_INT);
        $query->bindValue(':annonce_id', $_GET["id"],PDO::PARAM_INT);
        
        $resultat= $query->execute();
     }else {
         echo "incorrect";
     }
    
}
//requête poure recup offre query 2SELECT * FROM `enchere` SELECT * FROM `enchere` 


$query2 = $pdo->prepare("SELECT * FROM `enchere` JOIN utilisateur ON utilisateur.id=enchere.utilisateur_id WHERE annonce_id = :id");
$query2->bindValue(':id', $_GET["id"],PDO::PARAM_INT);
$query2->execute();
$enchere= $query2->fetchAll(PDO::FETCH_ASSOC);
// var_dump($enchere);


$query = $pdo->prepare("SELECT * FROM `annonces` WHERE id = :id");
$query->bindValue(':id', $_GET["id"],PDO::PARAM_INT);
$query->execute();
$annonce= $query->fetch(PDO::FETCH_ASSOC);

// $query3 = $pdo->prepare ("SELECT MAX(prix-propose) FROM enchereJOIN utilisateur ON enchere.utilisateur_id = utilisateur.id WHERE annonce_id = :id") ;
// $gagnant = $query3->bindValue(":id",$_GET["id"],PDO::PARAM_INT);
// $query3->execute();

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

   <?php  if(isset($_SESSION["id_utilisateur"]) && $annonce['datefin'] > date("Y-m-d")) {?>

    <form action="liste_enchere.php?id=<?= $_GET ['id'] ?>" method="post">
        <p>
            <label for="offre">Offre proposée: </label>
            <input type="number" name="offre" id="offre">
        </p>
        <!-- <p>
            <label for="date">Date de l'offre: </label>
            <input type="date" name="date" id="date">
        </p> -->

     

        <input type="submit" value="ajouter" name="submitEncheres">

    </form>


   <?php } elseif($annonce['datefin'] < date("Y-m-d")){
    
    echo 'Enchère terminé, le gagnant est l\'utilisateur numéro '.$_SESSION['id_utilisateur'];
    }else{
        echo 'Veuillez vous connecter';
    }

    

   
   ?>
    </div>
</div>

 <?php foreach ($enchere as $key => $value) {
    
   echo $value["offre"]."<br>".$value["date"]." ".$value["prenom"];

} ?>

</section>

