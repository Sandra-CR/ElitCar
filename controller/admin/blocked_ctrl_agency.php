<?php

include_once "../../model/pdo.php";
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

if (isset($_GET['id'])) {
    $idPro = $_GET['id'];

    // Récupérer les données de l'utilisateur
    $sql = "SELECT * FROM professional WHERE id_pro=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idPro]);
    $pro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pro) {
        if ($pro['blocked'] == 0) {
            $sql = "UPDATE professional SET blocked=? WHERE id_pro=?";
            $stmt = $pdo->prepare($sql);
            if ( $stmt->execute([1, $idPro]) ) {
                sendMessage("Compte Bloqué avec succés", "success", "../../../view/admin/agency_table");
            }else {
                sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/admin/agency_table");
            }
        }
        else{
            $sql = "UPDATE professional SET blocked=? WHERE id_pro=?";
            $stmt = $pdo->prepare($sql);
            if ( $stmt->execute([0, $idPro]) ) {
                sendMessage("Compte Débloqué avec succés", "success", "../../../view/admin/agency_table");
            }else {
                sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/admin/agency_table");
            }
        }

    } else {
    sendMessage("Utilisateur non trouvé", "failed", "../../../view/admin/particular_table");
    }
}

