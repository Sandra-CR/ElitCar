<?php
session_start();

// Vérifier si un message d'erreur est défini
if (isset($_SESSION['error_message'])) {
    $errorMessage = $_SESSION['error_message'];
    // Effacer le message après l'avoir utilisé
    unset($_SESSION['error_message']);
} else {
    header('Location: subscription.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
</head>
<body>
    <h2>Erreur</h2>
    <p><?php echo htmlspecialchars($errorMessage); ?></p>
    <button style="background-color:#FFAA00;color:white;padding:5px;font-weight:700;font-size:16px;" onclick="history.back();">Retourner</button>
    <p class="text-center mt-3" style="font-size: 14px; color: #6c757d;">
        Besoin d'aide ? Notre <a href="#" style="color: #007bff;">équipe de support</a> est là pour vous aider. <br>Veuillez communiquer le message d'erreur ci-dessus pour une assistance rapide.
    </p>
</body>
</html>
