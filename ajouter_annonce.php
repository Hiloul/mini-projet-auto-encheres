<link rel="stylesheet" href="style/style.css">
<?php
require __DIR__."/pdo.php";

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
    var_dump($annonces);
    
};

    
?>

<?php include('navbar.php'); ?> 
    <form action="ajouter_annonce.php" method="post">
        <h1>Deposer une annonce</h1>
        <p>
            <label for="model">model</label>
            <input type="text" name="model" id="model">
        </p>
        <p>
            <label for="marque">marque</label>
            <input type="text" name="marque" id="marque">
        </p>

        <p>
            <label for="Couleur">Couleur</label>
            <input type="text" name="Couleur" id="Couleur">
        </p>

        <p>
            <label for="annee">annee</label>
            <input type="number" name="annee" id="annee">
        </p>

        <p>
            <label for="kilomatrage">kilometrage</label>
            <input type="number" name="kilometrage" id="kilometrage">
        </p>

        <p>
            <label for="carburant">carburant</label>
            <input type="text" name="carburant" id="carburant">
        </p>

        <p>
            <label for="boitevitesse">boitevitesse</label>
            <input type="text" name="boitevitesse" id="boitevitesse">
        </p>

        <p>
            <label for="prixdepart">prixdepart</label>
            <input type="number" name="prixdepart" id="prixdepart">
        </p>

        <p>
            <label for="description">description</label>
            <input type="text" name="description" id="description">
        </p>

        <p>
            <label for="datedebut">datedebut</label>
            <input type="date" name="datedebut" id="datedebut">
        </p>

        <p>
            <label for="datefin">datefin</label>
            <input type="date" name="datefin" id="datefin">
        </p>
        <p>
            <label for="utiliateur">utilisateur</label>
            <select name="utilisateur" id="utilisateur">
                <?php foreach ($utilisateur as $key => $value) { ?>
                    <option value="<?= $value["id"] ?>"><?= $value["nom"] . " " . $value["prenom"] ?></option>
                <?php } ?>

            </select>
        </p>

        <input type="submit" value="ajouter" name="submitAnnonce">

    </form>
    <?php if (isset($_POST["submitAnnonce"])) {
        if ($utilisateur) {
            echo "aannonce ajouter";
        } else {
            echo "erreur l'ors de l'ajout";
        }
    } ?>
    <footer>
    <p>&copy;AutoEnchères</p>
</footer>

