<?php

include_once "../../model/pdo.php";
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM particular WHERE id_user= $id";
    $stmt = $pdo->prepare($sql);
    if ( $stmt->execute() ) {
        sendMessage("Compte Supprimée avec succés", "success", "../../../view/admin/particular_table");
    }else {
        sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/admin/particular_table");
    }

}