<?php
require_once('../vendor/autoload.php');

session_start();

// Vérifier si l'ID client Stripe existe dans la session
if (isset($_SESSION['stripe_customer_id'])) {
    $stripeCustomerId = $_SESSION['stripe_customer_id'];

    try {
        // Configurer la clé secrète de l'API Stripe
        \Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');

        // Récupérer les moyens de paiement enregistrés pour le client
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $stripeCustomerId,
            'type' => 'card',
        ]);

        // Affichage des moyens de paiement
        foreach ($paymentMethods->data as $paymentMethod) {
            echo 'Carte se terminant par ' . $paymentMethod->card->last4 . ', expirant ' . $paymentMethod->card->exp_month . '/' . $paymentMethod->card->exp_year . '<br>';
        }
        
    } catch (\Exception $e) {
        // Gérer l'erreur
        echo 'Erreur lors de la récupération des moyens de paiement : ' . $e->getMessage();
    }
} else {
    echo 'Aucun moyen de paiement enregistré.';
}
?>
