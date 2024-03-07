<?php
include_once "../model/pdo.php";
require_once('../vendor/autoload.php');

session_start();
$userEmail = $_SESSION['email']; 
var_dump($userEmail);
$userID = $_SESSION['id']; 
var_dump($userID);

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');

if (!empty($_POST['stripeToken'])) {
    $token = $_POST['stripeToken'];
    try {
        // Créer un client dans Stripe
        $customer = \Stripe\Customer::create([
            'email' => $userEmail, 
            'source' => $token,
        ]);

        // Stocker l'ID client Stripe dans la session pour une utilisation ultérieure
        $_SESSION['stripe_customer_id'] = $customer->id;

        // Redirection vers la page de gestion des moyens de paiement
        header('Location: ../view/professional/payment_method_professional.php'); 
        exit();
        
    } catch (\Exception $e) {
        // erreur
        $error = 'Une erreur est survenue : ' . $e->getMessage();
        echo htmlspecialchars($error);
    }
}
?>
