<?php
include_once "../../model/pdo.php";

// Fonction pour vérifier la complexité du mot de passe
function verif_mdp($mdp) {
    $regex = '#^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#';
    return preg_match($regex, $mdp);
}

if (!isset($_SESSION['id'])) {
    exit("Utilisateur non identifié.");
}

$id_user = $_SESSION['id'];

// Initialisation des messages d'erreur
$errors = [];

// Modifier le mot de passe 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['old-password'], $_POST['new-password'], $_POST['confirm-password'])) {
    $oldPassword = $_POST['old-password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // Vérification que les champs ne sont pas vides
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        $errors[] = "Tous les champs doivent être remplis !";
    } else {
        // Vérification si le nouveau mot de passe correspond à la confirmation
        if ($newPassword !== $confirmPassword) {
            $errors[] = "Les nouveaux mots de passe ne correspondent pas !";
        } else {
            // Vérification si le nouveau mot de passe est différent de l'ancien mot de passe
            if ($newPassword === $oldPassword) {
                $errors[] = "Le nouveau mot de passe doit être différent de l'ancien mot de passe !";
            } else {
                // Vérification de la complexité du nouveau mot de passe
                if (!verif_mdp($newPassword)) {
                    $errors[] = "Le nouveau mot de passe doit comporter au moins 8 caractères, une lettre majuscule, un chiffre et un caractère spécial (@$!%*?&)";
                } else {
                    // Vérification du mot de passe actuel
                    $stmt = $pdo->prepare("SELECT psw FROM professional WHERE id_pro = :id_user");
                    $stmt->execute([':id_user' => $id_user]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($oldPassword, $user['psw'])) {
                        // Hasher le nouveau mot de passe
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                        // Mise à jour du mot de passe
                        $updateStmt = $pdo->prepare("UPDATE professional SET psw = :hashedPassword WHERE id_pro = :id_user");
                        $updateStmt->execute([':hashedPassword' => $hashedPassword, ':id_user' => $id_user]);

                        echo '<h6 style="color:green;">Mot de passe mis à jour avec succès !</h6>';
                    } else {
                        $errors[] = "Ancien mot de passe incorrect !";
                    }
                }
            }
        }
    }
}

// Affichage des erreurs
foreach ($errors as $error) {
    echo '<h6 style="color:red;">' . $error . '</h6>';
}
?>
