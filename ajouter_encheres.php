<?php

require __DIR__."/pdo.php";

$query= $pdo->prepare("SELECT * FROM `utilisateur`ORDER BY nom ASC");

$query->execute();

$utilisateur = $query->fetchAll(PDO::FETCH_ASSOC);
$annonce = $query2->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST["submitEncheres"])) {
    $result = $pdo->prepare("INSERT INTO enchere (offre, date, utilisateur_id, annonce_id) VALUES (:offre,:date,:utilisateur_id,:annonce_id)");
    $result->bindValue(":offre", $_POST["offre"], PDO::PARAM_STR);
    $result->bindValue(":date", $_POST["date"], PDO::PARAM_STR);
    $result->bindValue(":utilisateur_id", $_POST["utilisateur"], PDO::PARAM_INT);
    $result->bindValue(":annonce_id", $_POST["annonce"], PDO::PARAM_STR);
    $annonces = $result->execute();
}

?>

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

        <p>
            <label for="annonce">annonce</label>
            <select name="annonce" id="annonce">
                <?php foreach ($utilisateur as $key => $value) { ?>
                    <option value="<?= $value["id"] ?>"><?= $value["nom"] . " " . $value["prenom"] ?></option>
                <?php } ?>

            </select>
        </p>

        <input type="submit" value="ajouter" name="submitEncheres">

    </form>
    <?php if (isset($_POST["submitEncheres"])) {
        if ($utilisateur) {
            echo "encheres  ajouter";
        } else {
            echo "erreur l'ors de l'ajout";
        }
    } ?>

</body>

</html>