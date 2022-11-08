<?php
require __DIR__."/pdo.php";
if(isset($_GET["id"])){
    $query = $pdo->prepare("SELECT * FROM annonces WHERE id=:id");
    $query->bindValue(':id', $_GET["id"], PDO::PARAM_INT);
    $query->execute();
    $annonce= $query->fetch(PDO::FETCH_ASSOC);
   var_dump($annonce);

}else{
    echo "erreur : parametre id manquant dans l'url ex: ?id=1";
}

?>








