<link rel="stylesheet" href="style/style.css">
<?php

 
 include('classes/sessionOk.php'); 




   
    if(isset($_POST["submitConnexion"])){

        $query = $pdo->prepare("SELECT id, email, password FROM utilisateur WHERE email = :email");
        $query->bindValue(':email',$_POST["email"],PDO::PARAM_STR);
        $query->execute();
        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
    var_dump($utilisateur);
    
<<<<<<< HEAD

    $query = $pdo->prepare("SELECT * FROM utilisateur");
    $query->execute();
    //recupere les données converti dans un tableau associatif
    $annonce= $query->fetch(PDO::FETCH_ASSOC);
=======
        if ($utilisateur) {
            $hash = $utilisateur['password'];
<<<<<<< HEAD
>>>>>>> origin/HilelavecunH
=======
>>>>>>> HilelavecunH
>>>>>>> 4342bae698b0e28ce04b154d2f5e0374741f4008
    
            if (password_verify($_POST['password'] ,$hash)) {
                echo "Mots de passe  valide";
                $_SESSION["id_utilisatateur"] = $utilisateur["id"];
                $_SESSION["email_utilisateur"] = $utilisateur["email"];
    
    
            } else {
                echo "Mots de passe non valide";
            }
        }else {
            echo "utilisateur non valide";
        }

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
        <input type="submit" value="Se connecter" name="submitConnexion">

    </form>
    </section>
   

<footer>
    <p>&copy;AutoEnchères</p>
</footer>



