<link rel="stylesheet" href="style/style.css">
<?php

require __DIR__."/pdo.php";

if(isset($_POST["submitLog"])) {
    

    $query = $pdo->prepare("SELECT * FROM utilisateur");
    $query->execute();
    //recupere les données converti dans un tableau associatif
    $annonce= $query->fetch(PDO::FETCH_ASSOC);
    var_dump($annonce);
    

}

?>



<?php include('navbar.php'); ?> 

<form action="page_connexion.php" method="post" >
        <h1>Formulaire de connexion</h1>
        
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </p>
        <input type="submit" value="Ajouter" name="submitLog">
    </form>
    <?php
    if (isset($_POST["submitLog"])) {
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



