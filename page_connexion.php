<?php
require __DIR__."/pdo.php";

$error = false;

function connection($utilisateur, $email, $password) {
    foreach ($utilisateur as $key => $value)
    if ($utilisateur['email'] === $_POST['email'] && $utilisateur['password'] === $_POST['password']
    ) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = connection($_POST["utilisateur"],$_POST["email"], $_POST["password"]);
    var_dump($result);
    if ($result) {
        // rediriger vers page d'accueil
        header("Location: index.php");
        exit();
    } else {
        echo
        $error = true;
    }

}

?>


<?php include('navbar.php'); ?> 
<?php if(!isset($loggedUser)): ?>
<form action="page_connexion.php" method="post">
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="Votre email...">
        <div id="email-help" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>









<!-- <body>
    <form action="page_connexion.php" method="post">
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </p>
        <input type="submit" value="Se connecter" name="submitLog">
    </form>
</body> -->




