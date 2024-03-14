<?php
require_once('../../vendor/autoload.php');
include_once "../../model/pdo.php"; 

// Vérifiez que l'utilisateur est connecté et a un ID utilisateur
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id']; 

    try {
        $stmt = $pdo->prepare("SELECT stripe_customer_id FROM stripe_customer WHERE id_pro = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $stripeCustomer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stripeCustomer) {
            \Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');
            
            // Récupérez les moyens de paiement enregistrés pour le client
            $paymentMethods = \Stripe\PaymentMethod::all([
                'customer' => $stripeCustomer['stripe_customer_id'],
                'type' => 'card',
            ]);


        if (!empty($paymentMethods->data)) {
            foreach ($paymentMethods->data as $paymentMethod) {
                // icônes de FontAwesome
                $brand = strtolower($paymentMethod->card->brand);
                $iconClass = ""; // Initialiser la variable de l'icône
                $brandText = ucfirst($paymentMethod->card->brand); // Texte de la marque à afficher par défaut
                switch ($brand) {
                    case 'visa':
                        $iconClass = 'fab fa-cc-visa';
                        break;
                    case 'mastercard':
                        $iconClass = 'fab fa-cc-mastercard';
                        break;
                    case 'amex':
                        $iconClass = 'fab fa-cc-amex';
                        break;
                    case 'discover':
                        $iconClass = 'fab fa-cc-discover';
                        break;
                    case 'diners-club':
                        $iconClass = 'fab fa-cc-diners-club';
                        break;
                    case 'jcb':
                        $iconClass = 'fab fa-cc-jcb';
                        break;
                    case 'unionpay':
                        $iconClass = 'fab fa-cc-unionpay';
                        break;
                    default:
                        $iconClass = ''; // Pas d'icône disponible
                        break;
                }
                
                echo '<div style="background-color: #1A1F71; padding: 20px; border-radius: 8px; color: white; font-family: Arial, sans-serif; position: relative; max-width: 210px; height:120px; overflow: hidden;">'; 
                echo '<div style="position: absolute; right: -10px; top: 20px; background-color: #FFC107; color: black; padding: 5px 15px; font-size: 10px;">Par défaut</div>'; 
                
                if ($iconClass) {
                    echo '<i class="'.$iconClass.'" style="font-size: 24px;"></i> ';
                } else {
                    // Affiche le texte de la marque si l'icône n'est pas disponible
                    echo '<span style="font-size: 24px;">'.$brandText.'</span> ';
                }
                echo '<div style=" font-size: 16px;margin-top: 33px;">.... ' . $paymentMethod->card->last4;
                echo ' <span style="float: right; font-size: 14px;margin-top: 2px;margin-left:20px">Exp ' . sprintf('%02d/%d', $paymentMethod->card->exp_month, $paymentMethod->card->exp_year) . '</span></div>';
                echo '</div>';
            }
        } else {
            echo 'Aucun moyen de paiement enregistré.';
        }
    } else {
        echo 'Aucun ID client Stripe enregistré pour cet utilisateur.';
    }

} catch (\Exception $e) {
    // Gestion des erreurs liées à Stripe ou à la base de données
    echo 'Erreur lors de la récupération de l\'ID client Stripe ou des moyens de paiement : ' . $e->getMessage();
}
} else {
echo 'Utilisateur non identifié ou non connecté.';
}
?>