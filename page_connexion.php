<link rel="stylesheet" href="style/style.css">
<?php
 require __DIR__."/pdo.php";
 
 include('classes/sessionOk.php'); 




   
    if(isset($_POST["submitConnexion"])){

        $query = $pdo->prepare("SELECT id, email, password FROM utilisateur WHERE email = :email");
        $query->bindValue(':email',$_POST["email"],PDO::PARAM_STR);
        $query->execute();
        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
    var_dump($utilisateur);
    
        if ($utilisateur) {
            $hash = $utilisateur['password'];

    
            if (password_verify($_POST['password'] ,$hash)) {
                echo "Mots de passe  valide";
                $_SESSION["id_utilisateur"] = $utilisateur["id"];
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
<form action="page_connexion.php" method="post" class="formPareil">
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </p>
        <input type="submit" value="Connexion" name="submitConnexion" class="subBtn">

    </form>
    </section>
   

<footer>
    <p>&copy;AutoEnchères</p>
</footer>



