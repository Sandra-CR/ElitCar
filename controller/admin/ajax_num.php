<?php

include_once "../../model/pdo.php";

if (!empty($_POST["numero"])) {
    $numero = $_POST["numero"];

    try {
        $sql = "INSERT INTO particular (num_mobile) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$numero]);
        $response = [
            "status" => "success",
            "message" => "Compte créé"
        ];

    } catch (Exception $error) {
        $response = [
            "status" => "Numéro inséré avec succès",
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