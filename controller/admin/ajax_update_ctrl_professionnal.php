<?php

// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires




if(!empty($_POST["name_pro"]) && !empty($_POST["num_mobile"]) && !empty($_POST["id_user"]) ) {
    $pp = "../../img/no_picture_update.svg";
    $idPro = $_POST["id_pro"];
    $num_mobile = $_POST["num_mobile"];
            try {
                $sql = "UPDATE professional SET name=?, num_mobile=?  WHERE id_pro=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["name_pro"], $num_mobile, $idPro]);
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