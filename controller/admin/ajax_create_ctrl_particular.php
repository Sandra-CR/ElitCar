<?php
// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

// Fonction pour vérifier le mot de passe
function verif_mdp($mdp) {
    $regex = '#^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#'; // Expression régulière pour vérifier les critères du mot de passe
    return preg_match($regex , $mdp); // Vérification du mot de passe selon l'expression régulière
}

// Vérification de la soumission des champs du formulaire
if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["mail"]) && !empty($_POST["psw"])) {
    $pp = "../../img/no_picture_update.svg"; // Chemin de l'image de profil par défaut
    $psw = $_POST["psw"]; // Récupération du mot de passe du formulaire

    // Vérification si le mot de passe respecte les critères
    if (verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I); // Hachage sécurisé du mot de passe
        $role = "1"; // Attribution du rôle (ici 1 pour utilisateur particulier)

        try {
            // Requête d'insertion des données dans la table "particular"
            $sql = "INSERT INTO particular (first_name, last_name, mail, psw, profile_picture, isEntreprise, role) VALUE (?,?,?,?,?,?,?) " ; 
            $stmt = $pdo->prepare($sql); // Préparation de la requête SQL
            $stmt->execute([$_POST["first_name"], $_POST["last_name"], $_POST["mail"], $psw,
            $pp , 0 ,$role]); // Exécution de la requête avec les valeurs fournies
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
            "message" => "Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule et au moins un chiffre."
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

