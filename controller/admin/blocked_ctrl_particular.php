<?php

include_once "../../model/pdo.php";
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les données de l'utilisateur
    $sql = "SELECT * FROM particular WHERE id_user=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Si le compte est actuellement débloqué, on le bloque
        if ($user['blocked'] == 0) {
            $blocked = 1; 

            // Mettre à jour le statut de blocage
            $sql = "UPDATE particular SET blocked=? WHERE id_user=?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$blocked, $id])) {
                sendMessage("Compte bloqué avec succès", "success", "../../../view/admin/particular_table");
            } else {
                sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/admin/particular_table");
            }

        }
        // Si le compte est actuellement bloqué, on le débloque
        else{
            $blocked = 0;

            // Mettre à jour le statut de blocage
            $sql = "UPDATE particular SET blocked=? WHERE id_user=?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$blocked, $id])) {
                sendMessage("Compte débloqué avec succès", "success", "../../../view/admin/particular_table");
            } else {
                sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/admin/particular_table");
            }
        }



    } else {
        sendMessage("Utilisateur non trouvé", "failed", "../../../view/admin/particular_table");
    }
}