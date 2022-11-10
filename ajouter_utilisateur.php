<link rel="stylesheet" href="style/style.css">
<?php

require __DIR__."/pdo.php";
include ('classes/sessionOk.php');
include ('classes/Utilisateurs.php');


if(isset($_POST["submitUser"])) {

        $user = new Utilisateur($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["password"] );
        $res= $user->save($pdo);
        header('Location: page_connexion.php');
}
?>



<?php include('navbar.php'); ?> 

<section class="bodysite">
<h1>Créer son profil</h1>
<form action="ajouter_utilisateur.php" method="post" class="formPareil" >
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



