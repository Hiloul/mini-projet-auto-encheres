<link rel="stylesheet" href="style/style.css">
 
<a href="http://localhost/php/mini-projet-auto-encheres//index.php">Accueil</a>
  

<h1>Enchères</h1>

<form action="Encheres.php" method="post">
        <p>
            <label for="offre">Offre proposée: </label>
            <input type="number" name="offre" id="offre">
        </p>
        <p>
            <label for="date">Date de l'offre: </label>
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
        if ($value) {
            echo "aannonce ajouter";
        } else {
            echo "ERREUR !!!!!!";
        }
    } ?>



<footer>
    <p>&copy;AutoEnchères</p>
</footer>
