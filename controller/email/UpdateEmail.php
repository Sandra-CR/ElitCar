<?php

if (!isset($_SESSION['id'])) {
    die("Utilisateur non identifié. Veuillez vous connecter.");
}

// vérification pour s'assurer que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $userModel = new UserModel($pdo);
    $controller = new UpdateUserEmailController($userModel);

    // Exécution du contrôleur avec les données reçues
    $result = $controller->execute($_SESSION['id'], $_POST['new-email'], $_POST['password']);

    // Gestion de l'affichage des erreurs et du succès
    if (!empty($result['errors'])) {
        foreach ($result['errors'] as $error) {
            echo "<div style='color: red;'>$error</div>";
        }
    } else {
        echo "<div style='color: green;'>{$result['success']}</div>";
        $_SESSION['email'] = $_POST['new-email']; // Mise à jour de l'email dans la session si succès
    }
}else{
}