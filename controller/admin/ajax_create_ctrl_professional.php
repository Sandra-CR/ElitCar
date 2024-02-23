<?php
// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données

function verif_mdp($mdp) {
    $regex = "#^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#";
    return preg_match($regex , $mdp);
}
// Fonction pour vérifier la validité de l'adresse email
function verif_mail($email) {
    $regex_mail = "/^(?=.{1,254}$)[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+)*@(?!-)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(?<!-)(?:\.[a-zA-Z]{2,})$/";
    // Vérification du domaine de l'e-mail
    $domain = explode('@', $email)[1];
    if (!checkdnsrr($domain, 'MX')) {
        return false;
    }
    return preg_match($regex_mail , $email);
}

// Vérification de la soumission des champs du formulaire
if(!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["psw"])  && isset($_POST["pol"])) {
    $pp = "../../img/no_picture_update.svg"; // Chemin de l'image de profil par défaut
    $psw = $_POST["psw"]; // Récupération du mot de passe du formulaire
    $pol = $_POST["pol"];
    $new = $_POST["new"];
    // Vérifier si le mot de passe respecte les critères
    if(verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I); // Hachage sécurisé du mot de passe
        $role = "4"; // Attribution du rôle (ici 4 pour utilisateur professionnel)
        $mail = $_POST["mail"];
        // Vérification de la validité de l'adresse email
        if (verif_mail($mail)) {
            if ($pol == "1") {
                try {
                    // Requête d'insertion des données dans la table "professional"
                    $sql = "INSERT INTO professional (name, mail, psw, profile_picture, role, newsletters, politique) VALUE (?,?,?,?,?,?,?) " ; 
                    $stmt = $pdo->prepare($sql); // Préparation de la requête SQL
                    $stmt->execute([$_POST["name"], $mail, $psw, $pp, $role, $new, $pol]); // Exécution de la requête avec les valeurs fournies
                    $response = [
                        "status" => "success",
                        "message" => "Utilisateur Créer"
                    ]; // Réponse en cas de succès
                } catch (Exception $error) {
                    $response = [
                        "status" => "failed",
                        "message" => "Probleme de bdd Contactez immédiatement un Admin !"
                    ]; // Réponse en cas d'échec de l'insertion dans la base de données
                }
            } else {
                $response = [
                    "status" => "failed",
                    "message" => "Politique d'utilisation non valide"
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
        $response = [
            "status" => "failed",
            "message" => "Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule, un  et au moins un chiffre."
          ]; // Réponse en cas de mot de passe invalide
    }
} else {
    $response = [
        "status" => "failed",
        "message" => "Veuillez remplir correctement les champs"
      ]; // Réponse en cas de champs manquants dans le formulaire
}

echo json_encode($response); // Conversion de la réponse en format JSON et affichage
?>
