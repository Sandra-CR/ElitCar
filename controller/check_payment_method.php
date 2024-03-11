<?php
require_once('../../vendor/autoload.php');
include_once "../../model/pdo.php"; 

function checkPaymentMethod() {

    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        // Récupérez l'ID client Stripe depuis la base de données
        global $pdo; // Récupérer l'objet PDO de l'espace global si nécessaire
        $stmt = $pdo->prepare("SELECT stripe_customer_id FROM stripe_customer WHERE id_pro = :userId");
        $stmt->execute(['userId' => $userId]);
        $stripeCustomer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$stripeCustomer) {
            return false; // Aucun ID client Stripe trouvé
        }

        $stripeCustomerId = $stripeCustomer['stripe_customer_id'];

        try {
            \Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');

            // Récupérer les moyens de paiement enregistrés pour le client
            $paymentMethods = \Stripe\PaymentMethod::all([
                'customer' => $stripeCustomerId,
                'type' => 'card',
            ]);

            // Retourner true si des moyens de paiement sont trouvés
            return !empty($paymentMethods->data);

        } catch (\Exception $e) {
            error_log('Erreur lors de la récupération des moyens de paiement : ' . $e->getMessage());
            return false;
        }
    } else {
        return false; // L'utilisateur n'est pas connecté ou l'ID utilisateur n'est pas défini
    }
}

$payment_method = checkPaymentMethod();
//var_dump($payment_method);
?>
