<?php
include_once "../../model/pdo.php";
include_once "tools.php";

function verif_mdp($mdp) {
    $regex = '#^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#';
    return preg_match($regex , $mdp);
}

function verif_mail($email) {
    $regex_mail = "/^(?=.{1,254}$)[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+)*@(?!-)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(?<!-)(?:\.[a-zA-Z]{2,})$/";
    return preg_match($regex_mail , $email);
}


if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["mail"]) && !empty($_POST["psw"])) {
    $pp = "../../img/no_picture_update.svg";
    $psw = $_POST["psw"];

    if (verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I);
        $role = "1";
        $mail = $_POST["mail"];

        if (verif_mail($mail)) {

            try {
                $sql = "INSERT INTO particular (first_name, last_name, mail, psw, profile_picture, isEntreprise, role) VALUES (?, ?, ?, ?, ?, 0, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["first_name"], $_POST["last_name"], $mail, $psw, $pp, $role]);
                $response = [
                    "status" => "success",
                    "message" => "Compte créé"
                ];

            } catch (Exception $error) {
                $response = [
                    "status" => "failed",
                    "message" => "Problème de base de données. Contactez immédiatement un administrateur !"
                ];
                // echo var_dump($error);
            }

        } else {
            $response = [
                "status" => "failed",
                "message" => "Email non valide"
            ];
        }

    } else {
        $response = [
            "status" => "failed",
            "message" => "Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule et au moins un chiffre"
        ];
    }

} else {
    $response = [
        "status" => "failed",
        "message" => "Veuillez remplir correctement les champs"
    ];
}

echo json_encode($response);
?>
