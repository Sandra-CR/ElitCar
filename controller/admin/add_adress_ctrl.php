
<?php
    // Informations de connexion à la base de données
    include_once "../../model/pdo.php";

    // Vérification de la soumission du formulaire
    if (!empty($_POST['street_name']) && !empty($_POST['neighborhood']) && !empty($_POST['city']) && !empty($_POST['region']) && !empty($_POST['postal_code'])) {
        // Récupération des données du formulaire
        $nomRue = $_POST['street-name'];
        $quartier = $_POST['neighborhood'];
        $ville = $_POST['city'];
        $region = $_POST['region'];
        $codePostal = $_POST['postal-code'];
        $descriptionSupp = $_POST['additional_description'];

        // Préparation de la requête SQL
        $sql = "INSERT INTO address_particulier (street_name, neighborhood, city, region, postal_code, additional_description) VALUES (?, ?, ?, ?, ?, ?)";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Exécution de la requête
        try {
            $stmt->execute([$nomRue, $quartier, $ville, $region, $codePostal, $descriptionSupp]);
           sendMessage("Adresse postale ajoutee", "success", "../../view/particular/adress_particular");
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'adresse postale : " . $e->getMessage();
        }
    } else{
        echo "erreur input";
    }
?>
