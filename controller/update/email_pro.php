<?php
include_once "../../model/pdo.php";

if (!isset($_SESSION['id'])) {
    exit("Utilisateur non identifié.");
}

$id_user = $_SESSION['id'];

// Fonction de vérification de syntaxe de l'e-mail
function is_valid_email($email) {
    // Vérification de la syntaxe de base de l'e-mail avec filter_var
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    // Vérification de la longueur maximale de l'e-mail
    if (strlen($email) > 254) {
        return false;
    }

    // Vérification des caractères spéciaux autorisés dans l'e-mail
    if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/', $email)) {
        return false;
    }

    // Vérification du domaine de l'e-mail
    $domain = explode('@', $email)[1];
    if (!checkdnsrr($domain, 'MX')) {
        return false;
    }

    return true;
}

// Fonction pour vérifier si l'e-mail existe déjà dans la base de données
function email_exists($pdo, $email, $id_user) {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM professional WHERE mail = :email AND id_pro != :id_user");
    $stmt->execute([':email' => $email, ':id_user' => $id_user]);
    return $stmt->fetchColumn() > 0;
}

// Récupérer l'e-mail actuel de l'utilisateur
$email_actuel = '';
$query = "SELECT mail FROM professional WHERE id_pro = :id_user";
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id_user' => $id_user]);
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $email_actuel = $row['mail'];
    } else {
        echo "Utilisateur non trouvé";
    }
} catch (PDOException $e) {
    die("Erreur lors de la requête à la base de données: " . $e->getMessage());
}

// Initialisation des messages d'erreur
$errors = [];

// Modifier l'e-mail
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new-email'], $_POST['password'])) {
    $newEmail = $_POST['new-email'];
    $password = $_POST['password'];

    // Vérification que les champs ne sont pas vides
    if (empty($newEmail) || empty($password)) {
        $errors[] = "Tous les champs doivent être remplis !";
    } else {
        // Vérification de la validité de l'adresse e-mail
        if (!is_valid_email($newEmail)) {
            $errors[] = "Adresse e-mail invalide !";
        } else {
            // Vérification si l'adresse e-mail est la même que l'e-mail actuel
            if ($newEmail === $email_actuel) {
                $errors[] = "La nouvelle adresse e-mail est identique à l'e-mail actuel !";
            } else {
                // Vérification si l'adresse e-mail existe déjà dans la base de données
                if (email_exists($pdo, $newEmail, $id_user)) {
                    $errors[] = "Cette adresse e-mail est déjà utilisée !";
                } else {
                    // Vérification du mot de passe
                    $stmt = $pdo->prepare("SELECT psw FROM professional WHERE id_pro = :id_user");
                    $stmt->execute([':id_user' => $id_user]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['psw'])) {
                        // Mise à jour de l'adresse e-mail
                        $updateStmt = $pdo->prepare("UPDATE professional SET mail = :newEmail WHERE id_pro = :id_user");
                        $updateStmt->execute([':newEmail' => $newEmail, ':id_user' => $id_user]);

                        // Réexécuter la requête pour obtenir l'e-mail mis à jour
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([':id_user' => $id_user]);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $email_actuel = $row['mail'];

                        echo '<h6 style="color:green;">Email mis à jour avec succès !</h6>';
                    } else {
                        $errors[] = "Mot de passe incorrect !";
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
