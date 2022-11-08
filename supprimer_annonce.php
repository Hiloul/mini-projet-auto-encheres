<?php 
    require __DIR__."/pdo.php";

    if(isset($_GET["id"])){
$query = $pdo->prepare("DELETE FROM `annonces` WHERE id=:id");
$query->bindValue(':id', $_GET["id"], PDO::PARAM_INT);
$resultat = $query->execute();
    if($resultat){
    header('Location: index.php');
}   else{
    echo "erreur lors de la suppresion";
        }
}   else{
    echo "erreur parametre id manquant dans l'url";
        }
