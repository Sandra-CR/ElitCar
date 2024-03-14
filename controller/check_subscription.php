<?php
require_once('../../vendor/autoload.php');
include_once "../../model/pdo.php"; 
function checkSubscription() {
    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        global $pdo;
        try {
            // Préparer la requête pour récupérer le statut actif de l'abonnement
            $stmt = $pdo->prepare("SELECT * FROM subscription WHERE id_pro = :userId AND status = 'active' ORDER BY created_at DESC LIMIT 1");
            $stmt->execute(['userId' => $userId]);
            $activeSubscription = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si un abonnement actif est trouvé
            return $activeSubscription !== false;

        } catch (PDOException $e) {
            error_log('Erreur lors de la vérification de l\'abonnement actif : ' . $e->getMessage());
            return false;
        }
    } else {
        return false; // L'utilisateur n'est pas connecté ou l'ID utilisateur n'est pas défini
    }
}

$hasActiveSubscription = checkSubscription();
?>