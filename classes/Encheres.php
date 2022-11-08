<<<<<<< HEAD
<<<<<<< HEAD
<?php 
require __DIR__."/pdo.php";

// $query= $pdo->prepare("SELECT * FROM `utilisateur`ORDER BY nom ASC");

// $query->execute();

// $utilisateur = $query->fetchAll(PDO::FETCH_ASSOC);



// if (isset($_POST["submitAnnonce"])) {


//     $result = $pdo->prepare("INSERT INTO enchere (offre,date,utilisateur_id,annonce_id) VALUES (:offre,:date,:utilisateur_id,:annonce_id)");
//     $result->bindValue(":offre", $_POST["model"], PDO::PARAM_STR);
//     $result->bindValue(":date", $_POST["marque"], PDO::PARAM_STR);
  
//     $result->bindValue(":utilisateur_id", $_POST["utilisateur"], PDO::PARAM_INT);
//     $annonces= $result->execute();
//     var_dump($annonces);
    
// };


$query = $pdo->prepare("SELECT * FROM enchere");
$query->execute();
//recupere les données converti dans un tableau associatif
$annonce= $query->fetchALL(PDO::FETCH_ASSOC);
// var_dump($annonce);

foreach($annonce as $key => $value){?>

<div id="foreach">

<?php
    echo $value['marque']." ".$value['model']." ".$value['annee'];
}
?>
</div>

?>


=======
<<<<<<< HEAD
>>>>>>> b7e1a9f54f4e34bebfa084b2b4ef28f16ff288d7















=======
>>>>>>> origin/olala

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>

  

<h1>Enchères</h1>

<form action="Encheres.php" method="post">
        <p>
            <label for="offre">offre</label>
            <input type="text" name="offre" id="offre">
        </p>
        <p>
            <label for="date">date</label>
            <input type="date" name="date" id="date">
        </p>

     
        <p>
            <label for="utiliateur">utilisateur</label>
            <select name="utilisateur" id="utilisateur">
                <?php foreach ($utilisateur as $key => $value) { ?>
                    <option value="<?= $value["id"] ?>"><?= $value["nom"] . " " . $value["prenom"] ?></option>
                <?php } ?>

            </select>
        </p>

        <input type="submit" value="ajouter" name="submitEncheres">

    </form>
    <?php if (isset($_POST["submitEncheres"])) {
        if ($utilisateur) {
            echo "aannonce ajouter";
        } else {
            echo "erreur l'ors de l'ajout";
        }
    } ?>

</body>
<<<<<<< HEAD
</html>
=======
</html>
<<<<<<< HEAD
=======
>>>>>>> origin/samir5
>>>>>>> b7e1a9f54f4e34bebfa084b2b4ef28f16ff288d7
=======
>>>>>>> origin/olala
