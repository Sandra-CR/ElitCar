    <?php
    // Connexion à la base de données
    include_once "../../model/pdo.php";

    // Récupération des valeurs saisies dans le formulaire
    $street_name = $_POST['street_name'];
    $neighborhood = $_POST['neighborhood'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal_code = $_POST['postal_code'];
    $additional_description = $_POST['additional_description'];

    // Insertion des valeurs dans la base de données
    $sql = "INSERT INTO address_particulier (street_name, neighborhood, city, region, postal_code, additional_description) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$street_name, $neighborhood, $city, $region, $postal_code, $additional_description]);

    // Affichage d'un message de succès
    echo "L'adresse a bien été modifiée.";

    
    