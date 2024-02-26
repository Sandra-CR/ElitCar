<?php

// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires


function verif_phoneNumber($numero){
    $regex_numMobile = "/^\+?\d{1,4}[-. ]?\(?[0-9]{1,}\)?[-. ]?[0-9]{1,}[-. ]?[0-9]{1,}$/";
    return preg_match($regex_numMobile , $numero);
}

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["num_mobile"]) && !empty($_POST["id_user"])) {
    $pp = "../../img/no_picture_update.svg";
    $num_mobile = $_POST["num_mobile"];
    $id = $_POST["id_user"];
        if (verif_phoneNumber($num_mobile)) {

            try {
                $sql = "UPDATE particular SET first_name=?, last_name=?, num_mobile=? WHERE id_user=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["first_name"], $_POST["last_name"], $num_mobile, $id]);
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
                "message" => "Numero de telephone non valide"
            ];
        }

    } else {
    $response = [
        "status" => "failed",
        "message" => "Veuillez remplir correctement les champs"
    ];
}

echo json_encode($response);