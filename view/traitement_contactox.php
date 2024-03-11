<?php
// Vos variables récupérées du formulaire
$contactmail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$demande = trim(filter_var($_POST['objet_de_la_demande'], FILTER_SANITIZE_STRING));
$message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));

// Validation des valeurs non vides
if (empty($contactmail) || empty($demande) || empty($message)) {
    echo "Veuillez remplir tous les champs du formulaire.";
    exit;
}

include("inc/constant.php");

// Requête préparée pour vérifier si l'email existe déjà
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE mail = :email");
    $checkStmt->bindParam(':email', $contactmail);
    $checkStmt->execute();

    $emailExists = $checkStmt->fetchColumn();

    if ($emailExists > 0) {
        // L'email existe déjà dans la table user, vous pouvez ajouter ici le code pour gérer cette situation

        // Requête préparée pour l'insertion
        $insertStmt = $conn->prepare("INSERT INTO contact_user (email, objet_de_la_demande, message) VALUES (:email, :objet_de_la_demande, :message)");

        // Liaison des paramètres
        $insertStmt->bindParam(':email', $contactmail);
        $insertStmt->bindParam(':objet_de_la_demande', $demande);
        $insertStmt->bindParam(':message', $message);

        // Exécution de la requête
        $insertStmt->execute();

        echo "Enregistrement ajouté avec succès.";
    } else {
        // L'email n'existe pas dans la table user, vous pouvez ajouter ici le code pour gérer cette situation
        echo "Cet e-mail n'existe pas dans notre système.";
    }
} catch (PDOException $e) {
    error_log("Erreur PDO: " . $e->getMessage(), 0);
    echo "Une erreur s'est produite lors de la vérification de l'e-mail. Veuillez réessayer plus tard.";
} finally {
    $conn = null;
}

// ...

?>
