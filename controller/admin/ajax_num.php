<?php

include_once "../../model/pdo.php";

if (!empty($_POST["id_user"]) && !empty($_POST["numero"])) {
    $id_user = $_POST["id_user"];
    $numero = $_POST["numero"];

    try {
        
        $check_user_sql = "SELECT * FROM particular WHERE id_user = ?";
        $check_stmt = $pdo->prepare($check_user_sql);
        $check_stmt->execute([$id_user]);
        $user = $check_stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            
            $update_sql = "UPDATE particular SET num_mobile = ? WHERE id_user = ?";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([$numero, $id_user]);
            $response = [
                "status" => "success",
                "message" => "Numéro mis à jour avec succès"
            ];
        } else {
            
            $response = [
                "status" => "failed",
                "message" => "L'utilisateur avec l'id spécifié n'existe pas dans la base de données"
            ];
        }
    } catch (Exception $error) {
        $response = [
            "status" => "failed",
            "message" => "Problème de base de données. Contactez immédiatement un administrateur !"
        ];
    }
} else {
    $response = [
        "status" => "failed",
        "message" => "Veuillez fournir un numéro valide"
    ];
}

echo json_encode($response);