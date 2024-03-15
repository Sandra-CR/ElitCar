<?php

include_once "../../model/pdo.php";
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM professional WHERE id_pro = $id";
    $stmt = $pdo->prepare($sql);
    if ( $stmt->execute() ) {
        sendMessage("Compte Supprimée avec succés", "success", "../../../view/admin/agency_table");
    }else {
        sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/admin/agency_table");
    }

}