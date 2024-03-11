<?php
include_once "../model/pdo.php"; 
require_once('../vendor/autoload.php');

session_start();
$userEmail = $_SESSION['email'];
$userId = $_SESSION['id'];
\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');

if (!empty($_POST['stripeToken'])) {
    $token = $_POST['stripeToken'];
    try {
        // Créer un client dans Stripe
        $customer = \Stripe\Customer::create([
            'email' => $userEmail, 
            'source' => $token,
        ]);

        // Stocker l'ID client Stripe dans la base de données
        $stripeCustomerId = $customer->id;

        // Utilisez votre objet PDO pour exécuter la requête
        $stmt = $pdo->prepare("INSERT INTO stripe_customer (id_pro, stripe_customer_id) VALUES (:userId, :stripeCustomerId) ON DUPLICATE KEY UPDATE stripe_customer_id = :stripeCustomerId");
        $stmt->execute(['userId' => $userId, 'stripeCustomerId' => $stripeCustomerId]);
        
        // Stocker également l'ID client Stripe dans la session pour une utilisation ultérieure
        $_SESSION['stripe_customer_id'] = $stripeCustomerId;
         // Redirection vers payment_method_professional.php si tout se passe bien
         header('Location: ../view/professional/payment_method_professional.php');
         exit;
    } catch (\Exception $e) {
        // erreur
        $error = ' Une erreur est survenue : ' . $e->getMessage();
        echo htmlspecialchars($error);
    }
}

// Si le customer ID est stocké dans la session, l'afficher
if (isset($_SESSION['stripe_customer_id'])) {
    echo "<br> Customer ID : " . $_SESSION['stripe_customer_id'];
} else {
    echo "Customer ID non disponible";
}
?>
