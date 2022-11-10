<link rel="stylesheet" href="style/style.css">

 
<?php include ('navbar.php'); ?>
<?php include  ('classes/sessionOk.php'); ?> 

<section class="bodysite">
<h1>Enchères</h1>

<form action="ajouter_offre.php" method="post">
        <p>
            <label for="offre">Offre proposée: </label>
            <input type="number" name="offre" id="offre">
        </p>
        <!-- <p>
            <label for="date">Date de l'offre: </label>
            <input type="date" name="date" id="date">
        </p> -->

     
        <p>
            <label for="utiliateur">Annonces choisie: </label>
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
            echo "ERREUR !!!!!!";
        }
    } ?>

</section>

<footer>
    <p>&copy;AutoEnchères</p>
</footer>
