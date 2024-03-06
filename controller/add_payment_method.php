<?php
include_once "../model/pdo.php";
require_once('../vendor/autoload.php');
// récuperer l'email de l'utilisateur
session_start();
$userEmail = $_SESSION['email']; 
var_dump($userEmail);

\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');

if (!empty($_POST['stripeToken'])) {
    $token = $_POST['stripeToken'];
    try {
        // Créer un client dans Stripe
        $customer = \Stripe\Customer::create([
            'email' =>  $userEmail, 
            'source' => $token,
        ]);
        
        // Ici, vous pouvez également enregistrer le customer ID dans votre base de données

        // Redirection vers la page de succès
        header('Location: ../view/professional/payment_method_professional.php'); 
        exit();
        
    } catch (\Stripe\Exception\CardException $e) {
        // La carte a été déclinée
        $error = 'La carte a été déclinée.';
    } catch (\Stripe\Exception\RateLimitException $e) {
        // Trop de requêtes faites à l'API trop rapidement
        $error = 'Trop de requêtes ont été faites à l\'API Stripe.';
    } catch (\Stripe\Exception\InvalidRequestException $e) {
        // Requête invalide
        $error = 'Requête invalide pour Stripe.';
    } catch (\Stripe\Exception\AuthenticationException $e) {
        // Authentication avec l'API Stripe échouée
        $error = 'L\'authentification avec l\'API Stripe a échoué.';
    } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Communication réseau avec Stripe échouée
        $error = 'La communication réseau avec Stripe a échoué.';
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Autres erreurs
        $error = 'Une erreur est survenue avec l\'API Stripe.';
    } catch (Exception $e) {
        // Autres erreurs non liées à Stripe
        $error = 'Une erreur est survenue.';
    }
    
    if (isset($error)) {
        echo htmlspecialchars($error);
    }
} 
?>



