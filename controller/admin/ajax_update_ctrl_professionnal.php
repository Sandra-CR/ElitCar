<?php

// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires




if(!empty($_POST["name_pro"]) ) {
    $pp = "../../img/no_picture_update.svg";
    $idPro = $_POST["id_pro"];
            try {
                $sql = "UPDATE professional SET name=? WHERE id_pro=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["name_pro"],$idPro]);
                $response = [
                    "status" => "success",
                    "message" => "Compte mis à jour"
                ];

            } catch (Exception $error) {
                $response = [
                    "status" => "failed",
                    "message" => "Problème de base de données. Contactez immédiatement un administrateur !"
                ];
            }

    } else {
    $response = [
        "status" => "failed",
        "message" => "Veuillez remplir correctement les champs"
    ];
}

echo json_encode($response);