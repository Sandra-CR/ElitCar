<?php

include_once "../../model/pdo.php";
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM car WHERE id_car= $id";
    $stmt = $pdo->prepare($sql);
    if ( $stmt->execute() ) {
        sendMessage("Annonce Supprimée avec succés", "success", "../../../view/professional/advertisements");
    }else {
        sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../../view/professional/advertisements");
    }

}