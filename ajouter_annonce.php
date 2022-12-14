<link rel="stylesheet" href="style/style.css">
<?php
require __DIR__."/pdo.php";
 include ('navbar.php'); 

$query= $pdo->prepare("SELECT * FROM `utilisateur`ORDER BY nom ASC");

$query->execute();

$utilisateur = $query->fetchAll(PDO::FETCH_ASSOC);



if (isset($_POST["submitAnnonce"])) {


    $result = $pdo->prepare("INSERT INTO annonces (model,marque,Couleur,annee,kilometrage,carburant,boitevitesse,prixdepart,description,datedebut,datefin,utilisateur_id) VALUES (:model,:marque,:Couleur,:annee,:kilometrage,:carburant,:boitevitesse,:prixdepart,:description,:datedebut,:datefin,:utilisateur_id)");
    $result->bindValue(":model", $_POST["model"], PDO::PARAM_STR);
    $result->bindValue(":marque", $_POST["marque"], PDO::PARAM_STR);
    $result->bindValue(":annee", $_POST["annee"], PDO::PARAM_INT);
    $result->bindValue(":Couleur", $_POST["Couleur"], PDO::PARAM_STR);
    $result->bindValue(":kilometrage", $_POST["kilometrage"], PDO::PARAM_INT);
    $result->bindValue(":carburant", $_POST["carburant"], PDO::PARAM_STR);
    $result->bindValue(":boitevitesse", $_POST["boitevitesse"], PDO::PARAM_STR);
    $result->bindValue(":prixdepart", $_POST["prixdepart"], PDO::PARAM_INT);
    $result->bindValue(":description", $_POST["description"], PDO::PARAM_STR);
    $result->bindValue(":datedebut", $_POST["datedebut"], PDO::PARAM_STR);
    $result->bindValue(":datefin", $_POST["datefin"], PDO::PARAM_STR);
    $result->bindValue(":utilisateur_id", $_POST["utilisateur"], PDO::PARAM_INT);
    $annonces= $result->execute();

    
    
    
};

    
?>


<?php include ('classes/sessionOk.php'); ?> 



<section class="bodysite">
<h1>Deposer une annonce</h1>
<div class="container">
  <div class="content">
    <form action="ajouter_annonce.php" method="post" id="formAnnonce">
        <p>
            <label for="model">Model: </label>
            <input type="text" name="model" id="model">
        </p>
        <p>
            <label for="marque">Marque: </label>
            <input type="text" name="marque" id="marque">
        </p>

        <p>
            <label for="Couleur">Couleur: </label>
            <input type="text" name="Couleur" id="Couleur">
        </p>

        <p>
            <label for="annee">Ann??e: </label>
            <input type="number" name="annee" id="annee">
        </p>

        <p>
            <label for="kilomatrage">Kilometrage: </label>
            <input type="number" name="kilometrage" id="kilometrage">
        </p>

        <p>
            <label for="carburant">Carburant: </label>
            <input type="text" name="carburant" id="carburant">
        </p>

        <p>
            <label for="boitevitesse">Bo??te de vitesse: </label>
            <input type="text" name="boitevitesse" id="boitevitesse">
        </p>

        <p>
            <label for="prixdepart">Mise ?? prix: </label>
            <input type="number" name="prixdepart" id="prixdepart">
        </p>

        <p>
            <label for="description">Description: </label>
            <input type="text" name="description" id="description">
        </p>

        <p>
            <label for="datedebut">D??but de l'ench??re: </label>
            <input type="date" name="datedebut" id="datedebut">
        </p>

        <p>
            <label for="datefin">Fin de l'ench??re: </label>
            <input type="date" name="datefin" id="datefin">
        </p>
        <p>
            <label for="utiliateur">Vendeur/se: </label>
            <select name="utilisateur" id="utilisateur">
                <?php foreach ($utilisateur as $key => $value) { ?>
                    <option value="<?= $value["id"] ?>"><?= $value["nom"] . " " . $value["prenom"] ?></option>
                <?php } ?>

            </select>
        </p>

        <input type="submit" value="ajouter" name="submitAnnonce" class="subBtn">

    </form>
    </div>
  <div class="flap"></div>
</div>
</section>
<footer>
<p>&copy;AutoEnch??res</p>
</footer>

    <?php if (isset($_POST["submitAnnonce"])) {
        if ($utilisateur) {
            header('Location: index.php');

        } else {
            echo "Erreur lors de l'ajout";
        }    
    } ?>        




