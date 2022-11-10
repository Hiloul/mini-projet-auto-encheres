
 $query = $pdo->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `password`) VALUES (:nom, :prenom, :email, :password)");
    $query->bindValue(':nom', $_POST["nom"],PDO::PARAM_STR);
    $query->bindValue(':prenom', $_POST["prenom"],PDO::PARAM_STR);
    $query->bindValue(':email', $_POST["email"],PDO::PARAM_STR);
    $query->bindValue(':password', password_hash($_POST["password"], PASSWORD_DEFAULT),PDO::PARAM_STR);
    $resultat= $query->execute();





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
<h1>Articles</h1>

<p>Chaque offre devra être consultable sous forme d'une page individuelle 
    en affichant les détails du véhicule.</p>



    <h3><a href="http://localhost/php/mini-projet-auto-encheres/">Home</a></h3>


    <footer>
    <p>&copy;AutoEnchères</p>
    </footer>
</body>
</html>


