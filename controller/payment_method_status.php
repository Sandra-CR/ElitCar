<?php
require_once('../../vendor/autoload.php');
include_once "../../model/pdo.php"; 

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');

function getCardStatus() {
    if (!isset($_SESSION['id'])) {
        return null; // L'utilisateur n'est pas connecté
    }

    global $pdo;
    $userId = $_SESSION['id'];

    // Récupérer l'ID client Stripe
    $stmt = $pdo->prepare("SELECT stripe_customer_id FROM stripe_customer WHERE id_pro = :userId");
    $stmt->execute(['userId' => $userId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return 'Aucun moyen de paiement trouvé ! Un moyen de paiement valide est obligatoire pour activer les abonnements.';
    }

    $stripeCustomerId = $result['stripe_customer_id'];

    try {
        // Récupérer le dernier moyen de paiement utilisé
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $stripeCustomerId,
            'type' => 'card',
        ]);

        if (empty($paymentMethods->data)) {
            return 'Aucune carte enregistrée.';
        }

        // le dernier moyen de paiement est la carte active
        $card = $paymentMethods->data[0];
        
        // Vérifier l'état de la carte 
        if ($card->card->exp_month < date('m') && $card->card->exp_year <= date('Y')) {
            return 'Votre carte est expirée ! Un moyen de paiement valide est obligatoire pour activer ou maintenir actifs vos abonnements.';
        }

    } catch (\Exception $e) {
        error_log('Erreur lors de la récupération du statut de la carte : ' . $e->getMessage());
        return 'Erreur lors de la vérification du statut de la carte.';
    }
}

$cardStatus = getCardStatus();
echo $cardStatus;
?>
