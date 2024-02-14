<?php
// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php";
include_once "tools.php";

// Fonction pour vérifier la validité du mot de passe
function verif_mdp($mdp) {
    $regex = "#^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#";
    return preg_match($regex , $mdp);
}

// Fonction pour vérifier la validité de l'adresse email
function verif_mail($email) {
    $regex_mail = "/^(?=.{1,254}$)[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+)*@(?!-)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(?<!-)(?:\.[a-zA-Z]{2,})$/";
    return preg_match($regex_mail , $email);
}

// Vérification si les champs requis sont remplis
if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["mail"]) && !empty($_POST["psw"])) {
    $pp = "img/no_picture_update.svg"; // Image de profil par défaut
    $psw = $_POST["psw"];

    // Vérification de la complexité du mot de passe
    if (verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I); // Hashage du mot de passe
        $role = "1"; // Définition du rôle de l'utilisateur
        $mail = $_POST["mail"];

        // Vérification de la validité de l'adresse email
        if (verif_mail($mail)) {

            try {
                // Préparation et exécution de la requête SQL pour insérer les données dans la base de données
                $sql = "INSERT INTO particular (first_name, last_name, mail, psw, profile_picture, isEntreprise, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_POST["first_name"], $_POST["last_name"], $mail, $psw, $pp, 0, $role]);
                $response = [
                    "status" => "success",
                    "message" => "Compte créé"
                ];

            } catch (Exception $error) {
                // En cas d'erreur lors de l'insertion des données
                $response = [
                    "status" => "failed",
                    "message" => "Problème de base de données. Contactez immédiatement un administrateur !"
                ];
            }

        } else {
            // Si l'adresse email est invalide
            $response = [
                "status" => "failed",
                "message" => "Email non valide"
            ];
        }

    } else {
        // Si le mot de passe ne satisfait pas les critères de complexité
        $response = [
            "status" => "failed",
            "message" => "Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule et au moins un chiffre"
        ];
    }

} else {
    // Si tous les champs requis ne sont pas remplis
    $response = [
        "status" => "failed",
        "message" => "Veuillez remplir correctement les champs"
    ];
}

// Retourne la réponse au format JSON
echo json_encode($response);
?>

