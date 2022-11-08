
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

<?php include('navbar.php'); ?> 
  

<h1>Enchères</h1>

<form action="Encheres.php" method="post">
        <p>
            <label for="offre">offre</label>
            <input type="number" name="offre" id="offre">
        </p>
        <p>
            <label for="date">date</label>
            <input type="date" name="date" id="date">
        </p>

     
        <p>
            <label for="utiliateur">utilisateur</label>
            <select name="utilisateur" id="utilisateur">
                <?php foreach ($annonce as $key => $value) { ?>
                    <option value="<?= $value["id"] ?>"><?= $value["nom"] . " " . $value["prenom"] ?></option>
                <?php } ?>

            </select>
        </p>

        <input type="submit" value="ajouter" name="submitEncheres">

    </form>
    <?php if (isset($_POST["submitEncheres"])) {
        if ($annonce) {
            echo "aannonce ajouter";
        } else {
            echo "erreur l'ors de l'ajout";
        }
    } ?>



<footer>
    <p>&copy;AutoEnchères</p>
</footer>
</body>
</html>
