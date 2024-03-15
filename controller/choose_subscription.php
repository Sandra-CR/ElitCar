
<?php
require '../vendor/autoload.php';
include_once "../model/pdo.php";

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');
session_start();
$userId = $_SESSION['id'];

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID du prix depuis le formulaire
    $priceId = $_POST['price_id'] ?? '';

    // S'assurer que l'ID du prix n'est pas vide
    if (!empty($priceId)) {
        // Récupérer l'ID client Stripe
        $stmt = $pdo->prepare("SELECT stripe_customer_id FROM stripe_customer WHERE id_pro = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $stripeCustomer = $stmt->fetch(PDO::FETCH_ASSOC);
        $customerId = $stripeCustomer['stripe_customer_id'];
        //var_dump($customerId);

        if (!$customerId ) {
            exit('ID client Stripe non trouvé pour cet utilisateur.');
        }

        // Récupérer l'ID de la table stripe_customer
        $stmt = $pdo->prepare("SELECT id_stripe_customer FROM stripe_customer WHERE stripe_customer_id = :stripeCustomerId");
        $stmt->bindParam(':stripeCustomerId', $customerId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id_stripe_customer'];

        try {
            // Créer l'abonnement
            $subscription = \Stripe\Subscription::create([
                'customer' => $customerId,
                'items' => [['price' => $priceId]],
            ]);

            // Récupérer le nom du plan à partir de l'objet d'abonnement
            $plan = \Stripe\Plan::retrieve($subscription->items->data[0]->plan->id);
            $product = \Stripe\Product::retrieve($plan->product);
            $planName = $product->name;

            // Insertion de l'abonnement dans la base de données, incluant le nom du plan
            $stmt = $pdo->prepare("INSERT INTO subscription (stripe_subscription_id, id_pro, id_stripe_customer, status, plan_name, created_at) VALUES (:stripe_subscription_id, :id_pro, :id_stripe_customer, :status, :plan_name, NOW())");
            $stmt->bindParam(':stripe_subscription_id', $subscription->id);
            $stmt->bindParam(':id_pro', $userId);
            $stmt->bindParam(':id_stripe_customer', $id);
            $stmt->bindParam(':status', $subscription->status);
            $stmt->bindParam(':plan_name', $planName); // Ajout du nom du plan
            $success = $stmt->execute();

            if ($success) {
                echo "Abonnement enregistré avec succès dans la base de données.";
            } else {
                echo "Erreur lors de l'enregistrement de l'abonnement dans la base de données.";
            }

            header('Location: ../view/professional/subscription.php');

            exit();

        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Gestion des erreurs
            echo "Erreur lors de la création de l'abonnement : " . $e->getMessage();
        }
    }else{
        echo " priceId est vide ! ";
    }
}
?>

