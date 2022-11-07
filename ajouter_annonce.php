<?php
require __DIR__."/pdo.php";
$query2 = $pdo->prepare("SELECT * FROM realisateur ORDER BY nom ASC");
$query2->execute();
$realisateurs= $query2->fetchALL(PDO::FETCH_ASSOC);


if(isset($_POST['submitFilm'])){
// var_dump($_POST['nom']);
$query = $pdo->prepare("INSERT INTO `film`(`titre`, `annee`,`real_id`) VALUES (:titre, :annee, :real_id)");
$query->bindValue(':titre', $_POST["titre"], PDO::PARAM_STR);
$query->bindValue(':annee', $_POST["annee"], PDO::PARAM_INT);
$query->bindValue(':real_id', $_POST["realisateur"], PDO::PARAM_INT);
$resultat = $query->execute();

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ajouter_film.php" method="POST">
        <p>
           <label for="titre">Titre</label> 
           <input type="text" name="titre" id="titre">
        </p>
        <p>
           <label for="annee">Année</label> 
           <input type="text" name="annee" id="annee">
        </p>
        <p>
        <label for="realisateur">Réalisateur</label> 
         <select name="realisateur" id="realisateur">
            <?php foreach($realisateurs as $key => $value) {?>
<option value="<?=$value["id"]?>"><?=$value["nom"]." ".$value["prenom"] ?></option>
            <?php } ?>
         </select>
        </p>
        <input type="submit" value="ajouter" name="submitFilm">
    </form>

<?php
if(isset($_POST['submitFilm'])){
   if($resultat){
    echo"Film ajouté";
   }else{
    echo"echec Ajout";
   }
    }
?>

</body>
</html>