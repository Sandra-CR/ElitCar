<?php
require_once '../vendor/autoload.php';
include_once "../model/pdo.php";

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');
session_start();
// Vérifiez si l'utilisateur est connecté et récupérez l'identifiant d'abonnement de l'URL
$userId = $_SESSION['id'];
//var_dump($userId);

$stmt = $pdo->prepare("SELECT stripe_subscription_id FROM subscription WHERE id_pro = :userId ORDER BY created_at DESC LIMIT 1");
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();
$subscriptionInfo = $stmt->fetch(PDO::FETCH_ASSOC);
$subscriptionId = $subscriptionInfo['stripe_subscription_id'];
//var_dump($subscriptionId);
if ($userId && $subscriptionId) {
    try {
        // Annuler l'abonnement via l'API Stripe
        $subscription = \Stripe\Subscription::update($subscriptionId, [
          'cancel_at_period_end' => true,
        ]);

        // Mettre à jour la base de données pour refléter l'annulation
        $stmt = $pdo->prepare("UPDATE subscription SET status = 'cancelled' WHERE stripe_subscription_id = :subscriptionId AND id_pro = :userId");
        $stmt->execute(['subscriptionId' => $subscriptionId, 'userId' => $userId]);

        echo "Abonnement annulé avec succès.";
        header('Location: ../view/professional/subscription.php');
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo "Erreur Stripe: " . $e->getMessage();
    } catch (PDOException $e) {
        echo "Erreur de base de données: " . $e->getMessage();
    }
} else {
    echo "Requête invalide.";
}
?>
