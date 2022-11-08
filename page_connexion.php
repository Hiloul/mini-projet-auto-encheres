<link rel="stylesheet" href="style/style.css">
<?php

require __DIR__."/pdo.php";




if(isset($_POST["email"], $_POST["password"])) {
    

    $query = $pdo->prepare("SELECT * FROM utilisateur");
    $query->execute();
    //recupere les données converti dans un tableau associatif
    $annonce= $query->fetch(PDO::FETCH_ASSOC);
    var_dump($annonce);
    

}

?>



<?php include('navbar.php'); ?> 

<section class="bodysite">
    <h1>S'identifier</h1>
<form action="page_connexion.php" method="post">
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </p>
        <input type="submit" value="Se connecter">

    </form>
    </section>
    <?php
    if (isset($_POST["email"], $_POST["password"])) {
        if ($annonce) {
            header('Location: index.php');
        } else {
            echo "Erreur lors de l'ajout";
        }
    }
    ?>


<footer>
    <p>&copy;AutoEnchères</p>
</footer>



