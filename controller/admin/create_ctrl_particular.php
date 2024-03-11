<?php
// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php";
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

// Fonction pour vérifier la validité du mot de passe

if (!isset($_POST["new"])) {
    $_POST["new"] = "0";
}
// Vérification si les champs requis sont remplis
if(
    !empty($_POST["first_name"])
    && !empty($_POST["last_name"])
    && !empty($_POST["mail"])
    && !empty($_POST["psw"])
    && isset($_POST["pol"])
){
    $fn = htmlspecialchars($_POST["first_name"]);
    $ln = htmlspecialchars($_POST["last_name"]);
    $pp = "img/no_picture_update.svg"; // Image de profil par défaut
    $psw = $_POST["psw"];
    $pol = $_POST["pol"];
    $new = $_POST["new"];
    

    // Vérification de la complexité du mot de passe
    if (verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I); // Hashage du mot de passe
        $role = "1"; // Définition du rôle de l'utilisateur
        $mail = htmlspecialchars($_POST["mail"]);
        // Vérification de la validité de l'adresse email
        if (verif_mail($mail)) {
            if ($pol == "1") {
                try {
                    // Préparation et exécution de la requête SQL pour insérer les données dans la base de données
                    $sql = "INSERT INTO particular (first_name, last_name, mail, psw, profile_picture, isEntreprise, role, newsletters, politique) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$fn, $ln, $mail, $psw, $pp, 0, $role, $new, $pol]);
                    if($stmt->rowCount() > 0){
                        $sql2 = "SELECT * FROM particular WHERE mail='$mail'"; // Requête SQL pour sélectionner l'utilisateur particulier avec l'adresse e-mail fournie
                        $stmt2 = $pdo->query($sql2); // Exécution de la requête SQL
                        $user = $stmt2->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif
                        if ($user) {
                            // le compte existe
                            if (password_verify($_POST['psw'], $user['psw'])) {
                                session_start();
                                // le mot de passe est correct
                                $_SESSION["id"] = $user['id_user']; 
                                $_SESSION["name"] = $user['first_name'] . " " . $user['last_name']; // Attribution du nom complet de l'utilisateur à la session
                                $_SESSION["role"] = $user['role']; // Attribution du rôle de l'utilisateur à la session
                                $_SESSION["token"] = bin2hex(random_bytes(16)); // Génération d'un jeton de sécurité et attribution à la session
                                sendMessage("Compte Crée", "success", "../../view/home.php"); // Redirection vers la page d'accueil
                            } else {
                                sendMessage("Mots de passe incorrect", "failed", "../../view/particular/login_particular"); // Redirection avec un message d'erreur si le mot de passe est incorrect
                            }
                        } else {
                            // le compte n'existe pas
                            sendMessage("le compte n'existe pas", "failed", "../../view/particular/create_particular"); // Redirection avec un message d'erreur si le compte n'existe pas
                        }
                    } else {
                        sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../view/particular/create_particular");
                    }
                } catch (Exception $error) {
                    // En cas d'erreur lors de l'insertion des données
                    sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../view/particular/create_particular");
                }
            } else {
                sendMessage("Politique d'utilisation non valide", "failed", "../../view/particular/create_particular");
            }
        } else {
            // Si l'adresse email est invalide
            sendMessage("Email non valide", "failed", "../../view/particular/create_particular");
        }

    } else {
        // Si le mot de passe ne satisfait pas les critères de complexité
        sendMessage("Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule, un chiffre et au moins un caractère spéciale", "failed", "../../view/particular/create_particular");
    }

} else {
    // Si tous les champs requis ne sont pas remplis
    sendMessage("Veuillez remplir correctement les champs et acceptez le condition d'utilisation", "failed", "../../view/particular/create_particular");
}
?>

