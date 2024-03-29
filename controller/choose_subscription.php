<?php
require '../vendor/autoload.php';
include_once "../model/pdo.php";

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');
session_start();
$userId = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $priceId = $_POST['price_id'] ?? '';
    if (!empty($priceId)) {
        $stmt = $pdo->prepare("SELECT stripe_customer_id FROM stripe_customer WHERE id_pro = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $stripeCustomer = $stmt->fetch(PDO::FETCH_ASSOC);
        $customerId = $stripeCustomer['stripe_customer_id'];

        if (!$customerId) {
            exit('ID client Stripe non trouvé pour cet utilisateur.');
        }

        $stmt = $pdo->prepare("SELECT id_stripe_customer FROM stripe_customer WHERE stripe_customer_id = :stripeCustomerId");
        $stmt->bindParam(':stripeCustomerId', $customerId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id_stripe_customer'];

        try {
            $subscription = \Stripe\Subscription::create([
                'customer' => $customerId,
                'items' => [['price' => $priceId]],
            ]);

            if ($subscription->status !== 'active') {
                // Gérer le cas où l'abonnement n'est pas actif
                $_SESSION['error_message'] = "Échec de l'activation de l'abonnement. Statut actuel de l'abonnement : " . $subscription->status;
                header('Location: ../view/professional/error.php'); 
                exit;
            }

            $plan = \Stripe\Plan::retrieve($subscription->items->data[0]->plan->id);
            $product = \Stripe\Product::retrieve($plan->product);
            $planName = $product->name;

            $stmt = $pdo->prepare("INSERT INTO subscription (stripe_subscription_id, id_pro, id_stripe_customer, status, plan_name, created_at) VALUES (:stripe_subscription_id, :id_pro, :id_stripe_customer, :status, :plan_name, NOW())");
            $stmt->bindParam(':stripe_subscription_id', $subscription->id);
            $stmt->bindParam(':id_pro', $userId);
            $stmt->bindParam(':id_stripe_customer', $id);
            $stmt->bindParam(':status', $subscription->status);
            $stmt->bindParam(':plan_name', $planName);
            $success = $stmt->execute();

            if ($success) {
                header('Location: ../view/professional/subscription.php');
                exit();
            } else {
                echo "Erreur lors de l'enregistrement de l'abonnement dans la base de données.";
            }

        } catch (\Stripe\Exception\ApiErrorException $e) {
            echo "Erreur lors de la création de l'abonnement : " . $e->getMessage();
        }
    } else {
        echo "Le prix ID est vide !";
    }
}
?>
