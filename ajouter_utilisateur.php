<link rel="stylesheet" href="style/style.css">
<?php

require __DIR__."/pdo.php";

if(isset($_POST["submitUser"])) {

    $query = $pdo->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)");
    $query->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $query->bindValue(':prenom', $_POST["prenom"],PDO::PARAM_STR);
    $query->bindValue(':email', $_POST["email"],PDO::PARAM_STR);
    $query->bindValue(':password', $_POST["password"],PDO::PARAM_STR);
    $resultat= $query->execute();

}

?>



<?php include('navbar.php'); ?> 

<section class="bodysite">
<h1>Créer son profil</h1>
<form action="ajouter_utilisateur.php" method="post" >
        <p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </p>
        <p>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </p>
        <input type="submit" value="Ajouter" name="submitUser">
    </form>
    </section>
    <?php
    if (isset($_POST["submitUser"])) {
        if ($resultat) {
            header('Location: page_connexion.php');
        } else {
            echo "Erreur lors de l'ajout";
        }
    }
    ?>


<footer>
    <p>&copy;AutoEnchères</p>
</footer>



