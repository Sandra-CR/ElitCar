<?php
require '../../vendor/autoload.php';
include_once "../../model/pdo.php";

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');
$userId = $_SESSION['id'] ?? null;

if ($userId) {
    try {
        $stmt = $pdo->prepare("SELECT stripe_subscription_id FROM subscription WHERE id_pro = :userId ORDER BY created_at DESC LIMIT 1");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $subscriptionInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($subscriptionInfo) {
            // Récupération de l'ID de l'abonnement Stripe
            $stripeSubscriptionId = $subscriptionInfo['stripe_subscription_id'];
            // Récupération de l'objet d'abonnement Stripe
            $subscription = \Stripe\Subscription::retrieve($stripeSubscriptionId);
            // Utilisation du statut de l'abonnement récupéré depuis Stripe
            $status = $subscription->status; 
            // Mise à jour du statut de l'abonnement dans la base de données
            $updateStmt = $pdo->prepare("UPDATE subscription SET status = :status WHERE stripe_subscription_id = :stripeSubscriptionId");
            $updateStmt->execute(['status' => $status, 'stripeSubscriptionId' => $stripeSubscriptionId]);
            $product = \Stripe\Product::retrieve($subscription->items->data[0]->plan->product);
            $planName = $product->name;

            // Définir la couleur en fonction du statut
            $statusColor = '#28a745'; // Vert pour les statuts actifs
            if ($status === 'canceled' || $status === 'unpaid') {
                $statusColor = '#dc3545'; // Rouge pour les statuts inactifs ou négatifs
            }
            echo '<div style="margin-top: 20px; font-family: Arial, sans-serif;">';
            echo '  <div style="background-color: #FFAA00; color: white; font-weight:600; padding: 10px; text-align: center;">';
            echo '      Informations sur l\'abonnement';
            echo '  </div>';
            echo '  <div style="background-color: #f8f9fa; padding: 20px;">';
            echo '      <strong>Abonnement:</strong> <span style="color: #17a2b8;">' . htmlspecialchars($planName) . '</span><br>';
            echo '      <strong>Statut:</strong> <span style="color:' . $statusColor . ';">' . htmlspecialchars($status) . '</span>';
            echo '  </div>';
            echo '</div>';
            
        } else {
            echo "Aucun abonnement trouvé.";
        }
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo "Erreur Stripe: " . $e->getMessage();
    } catch (PDOException $e) {
        echo "Erreur de base de données: " . $e->getMessage();
    }
} else {
    echo "Utilisateur non identifié.";
}
?>
