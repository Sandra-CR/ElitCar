<?php
// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

// Vérification de la soumission des champs du formulaire
if(!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["psw"])  && isset($_POST["pol"])) {
    $pp = "img/no_picture_update.svg"; // Chemin de l'image de profil par défaut
    $psw = $_POST["psw"]; // Récupération du mot de passe du formulaire
    $pol = $_POST["pol"];
    $new = $_POST["new"];
    // Vérifier si le mot de passe respecte les critères
    if(verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I); // Hachage sécurisé du mot de passe
        $role = "4"; // Attribution du rôle (ici 4 pour utilisateur professionnel)
        $mail = htmlspecialchars($_POST["mail"]);
        $name = htmlspecialchars($_POST["name"]);
        // Vérification de la validité de l'adresse email
        if (verif_mail($mail)) {
            if ($pol == "1") {
                try {
                    // Requête d'insertion des données dans la table "professional"
                    $sql = "INSERT INTO professional (name, mail, psw, profile_picture, role, newsletters, politique) VALUE (?,?,?,?,?,?,?) " ; 
                    $stmt = $pdo->prepare($sql); // Préparation de la requête SQL
                    $stmt->execute([$name, $mail, $psw, $pp, $role, $new, $pol]);
                        if($stmt->rowCount() > 0){// Exécution de la requête avec les valeurs fournies
                        $sql2 = "SELECT * FROM professional WHERE mail='$mail'"; // Requête SQL pour sélectionner l'utilisateur particulier avec l'adresse e-mail fournie
                        $stmt2 = $pdo->query($sql2); // Exécution de la requête SQL
                        $pro = $stmt2->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif
                        if ($pro) {
                            // le compte existe
                            if (password_verify($_POST['psw'], $pro['psw'])) {
                                session_start();
                                // le mot de passe est correct
                                $_SESSION["id"] = $pro['id_user']; 
                                $_SESSION["name"] = $pro['name']; // Attribution du nom complet de l'utilisateur à la session
                                $_SESSION["role"] = $pro['role']; // Attribution du rôle de l'utilisateur à la session
                                $_SESSION["token"] = bin2hex(random_bytes(16)); // Génération d'un jeton de sécurité et attribution à la session
                                sendMessage("Compte Crée", "success", "../../view/home.php"); // Redirection vers la page d'accueil
                            } else {
                                sendMessage("Mots de passe incorrect", "failed", "../../view/particular/login_particular"); // Redirection avec un message d'erreur si le mot de passe est incorrect
                            }
                        } else {
                            // le compte n'existe pas
                            sendMessage("le compte n'existe pas", "failed", "../../view/particular/create_particular"); // Redirection avec un message d'erreur si le compte n'existe pas
                        }
                    }else {
                        sendMessage("Probleme de bdd Contactez immédiatement un Admin !", "failed", "../../view/particular/create_particular");
                    } 
                } catch (Exception $error) {
                    sendMessage("Probleme de bdd Contactez immédiatement un Admin !", "failed", "../../view/particular/create_particular"); // Réponse en cas d'échec de l'insertion dans la base de données
                }
            } else {
                sendMessage("Politique d'utilisation non valide", "failed", "../../view/particular/create_particular");
            }
        } else {
            // Si l'adresse email est invalide
            sendMessage("Politique d'utilisation non valide", "failed", "../../view/particular/create_particular");
        }
    } else {
        sendMessage("Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule, un  et au moins un chiffre.", "failed", "../../view/particular/create_particular");
    }
} else {
    sendMessage("Veuillez remplir correctement les champs", "failed", "../../view/particular/create_particular");
}

?>
