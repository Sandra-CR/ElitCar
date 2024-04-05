<?php 

// Démarrage de la session pour la gestion des variables de session
session_start();

// Initialisation du tableau d'erreurs
$errors = array();

// Inclusion du fichier mail.php pour les fonctionnalités liées à l'envoi de courriels
require "mail.php";

// Inclusion du fichier constants.inc.php pour les constantes utiles
include_once "../model/pdo.php";

try {
    // Configuration du mode d'affichage des erreurs de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Affichage d'un message d'erreur en cas d'échec de la connexion
    die("La connexion n'a pas pu être établie : " . $e->getMessage());
}

// Initialisation du mode par défaut à 'enter_email' sauf si un mode est spécifié dans l'URL
$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

// Traitement des données postées
if (count($_POST) > 0) {
    switch ($mode) {
        case 'enter_email':
            // Récupération de l'adresse email postée
            $email = $_POST['mail'];
            // Vérification de la validité de l'adresse email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Veuillez insérer une adresse email valide";
            } elseif (!valid_email($pdo, $email)) {
                // Vérification de l'existence de l'adresse email dans la base de données
                $errors[] = "Adresse email invalide";
            } else {
                // Stockage de l'adresse email dans la session et envoi d'un courriel de réinitialisation
                $_SESSION['forgot']['mail'] = $email;
                send_email($pdo, $email);
                // Redirection vers la page de saisie du code
                header("Location: forgot.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
            // Récupération du code posté
            $code = $_POST['code'];
            // Vérification de la validité du code saisi
            $result = is_code_correct($pdo, $code);
            if ($result === "le code est correct") {
                // Stockage du code dans la session et redirection vers la page de saisie du nouveau mot de passe
                $_SESSION['forgot']['code'] = $code;
                header("Location: forgot.php?mode=enter_password");
                die;
            } else {
                // Affichage d'une erreur si le code saisi n'est pas correct
                $errors[] = $result;
            }
            break;

        case 'enter_password':
            // Récupération des mots de passe postés
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            // Vérification de la correspondance entre les mots de passe
            if ($password !== $password2) {
                $errors[] = "Les mots de passe ne correspondent pas";
            } elseif (!isset($_SESSION['forgot']['mail']) || !isset($_SESSION['forgot']['code'])) {
                // Redirection vers la page de récupération de mot de passe si les informations nécessaires ne sont pas disponibles dans la session
                header("Location: forgot.php");
                die;
            } else {
                // Sauvegarde du nouveau mot de passe dans la base de données
                save_password($pdo, $password);
                // Suppression des informations de récupération de mot de passe de la session
                if (isset($_SESSION['forgot'])) {
                    unset($_SESSION['forgot']);
                }
                // Redirection vers la page de connexion
                header("Location: particular/login_particular.php");
                die;
            }
            break;

        default:
            // Traitement par défaut
            break;
    }
}

// Fonction d'envoi de courriel pour la réinitialisation de mot de passe
function send_email($pdo, $email) {
    // Durée de validité du code (2 minutes)
    $expire = time() + (60 * 2);
    // Génération d'un code aléatoire
    $code = rand(10000, 99999);
    // Protection contre les injections SQL en utilisant des requêtes préparées
    $email = addslashes($email);
    // Insertion du code dans la base de données
    $query = "INSERT INTO codes (mail, code, expire) VALUES (:mail, :code, :expire)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':mail', $email);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':expire', $expire);
    $stmt->execute();
    // Envoi du courriel contenant le code
    send_mail($email, 'Réinitialisation du mot de passe', 'Votre code est : '. $code);
}

// Fonction de sauvegarde du nouveau mot de passe dans la base de données
function save_password($pdo, $password) {
    // Récupération de l'adresse email stockée dans la session
    $email = addslashes($_SESSION['forgot']['mail']);
    // Hachage du mot de passe pour des raisons de sécurité
    $password = password_hash($password, PASSWORD_ARGON2I);
    // Mise à jour du mot de passe dans la base de données
    $query = "UPDATE particular SET psw = :psw WHERE mail = :mail";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':psw', $password);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
}

// Fonction de vérification de l'existence de l'adresse email dans la base de données
function valid_email($pdo, $email) {
    // Requête SQL pour vérifier l'existence de l'adresse email
    $query = "SELECT * FROM particular WHERE mail = :mail LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
    // Renvoie true si l'adresse email existe, sinon false
    return $stmt->rowCount() > 0;
}

// Fonction de vérification de la validité du code saisi
function is_code_correct($pdo, $code) {
    // Récupération du temps actuel
    $expire = time();
    // Récupération de l'adresse email stockée dans la session
    $email = addslashes($_SESSION['forgot']['mail']);
    // Requête SQL pour vérifier le code
    $query = "SELECT * FROM codes WHERE code = :code AND mail = :mail ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
    // Si le code est trouvé dans la base de données
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Si le code est toujours valide
        if ($row['expire'] > $expire) {
            return "le code est correct";
        } else {
            return "le code a expiré";
        }
    } else {
        return "le code n'est pas correct";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elitcar">
    <base href="http://localhost/ElitCar/" target="_self">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="js/main.js"></script>
    <title>ElitCar</title>
</head>
<body>
   

    <?php
    switch ($mode) {
        case 'enter_email':
            // code...
            ?>
            <div class="container-main-login d-flex justify-content-center g-0 ">
            <div class="container-login col-12 col-lg-5">
            <div class="container-logo"><a target="_self" href="view/home"><img src="img/elitcar-login.png" alt="Logo Elitcar" width="256px" height="64px"></a></div>
            <div class="container-title">
                <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/particular/login_particular">SE CONNECTER</a></h5>
                <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/login">S'INSCRIRE</a></h5>
            </div>
            <div class="container-divider">
                <div class="divider-switch3 "></div>
                <div class="divider-switch4 "></div>
            </div>
            <div class="container-title-2">
                <h4 >Avez-vous perdu votre mot de passe ?</h4>
            </div>
            <form id="formpassword" class="mx-auto col-8 mt-2" action="view/forgot.php?mode=enter_email" method="post">
                <div class="form-floating mb-3">
                    <input type="mail" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Entrez votre Email ici</label>
                </div>
                <div class="container-btn-mail mx-auto">
                    <input type="submit" class="form-control mt-3 btn btn-warning text-light" value="Envoyer">
                </div>
            </form>
            </div>
            <div class="container-img-login d-none d-xl-block col-7"></div>

        </div>  
            </form>
            <?php
            break;
        case 'enter_code':
            // code...
            ?>
            <form class="formpassword" method="post" action="view/forgot.php?mode=enter_code">
            <div class="container-main-login d-flex justify-content-center g-0 ">
    <div class="container-login col-12 col-lg-5">
        <div class="container-logo"><a target="_self" href="view/home"><img src="img/elitcar-login.png" alt="Logo Elitcar" width="256px" height="64px"></a></div>
        <div class="container-title">
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/particular/login_particular">SE CONNECTER</a></h5>
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/login">S'INSCRIRE</a></h5>

        </div>
        <div class="container-divider">
            <div class="divider-switch3 "></div>
            <div class="divider-switch4 "></div>
        </div>
        <div class="container-title-2">
            <h4 >Mot de passe oublié</h4>
        </div>
        <form id="form" class="mx-auto col-8 mt-2" action="" method="post">
            <div class="container-title-2">
                <p>
                Si votre adresse e-mail est présente dans notre
                base de données, vous recevrez dans quelques
                minutes un courriel vous fournissant les instructions pour réinitialiser votre mot de passe. 
                Si vous ne localisez pas ce courriel veuillez vérifier votre dossier indésirableou vos spams.
                </p>
            </div>
            <div class="container-title-2">
                <h7>Renvoyer l’email</h7>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="code" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Entrez votre code ici</label>
            </div>
            <div class="container-btn-mail mx-auto">
                <input type="submit" class="form-control mt-3 btn btn-warning text-light" value="Envoyer">
            </div>
        </form>
    </div>
    <div class="container-img-login d-none d-xl-block col-7"></div>

    </div>
            </form>
            <?php
            break;
        case 'enter_password':
            // code...
            ?>
            <form class="formpassword" method="post" action="view/forgot.php?mode=enter_password">
            <div class="container-main-login d-flex justify-content-center g-0 ">
            <div class="container-login col-12 col-lg-5">
            <div class="container-logo"><a target="_self" href="view/home"><img src="img/elitcar-login.png" alt="Logo Elitcar" width="256px" height="64px"></a></div>
            <div class="container-title">
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/particular/login_particular">SE CONNECTER</a></h5>
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/login">S'INSCRIRE</a></h5>

            </div>
            <div class="container-divider">
                <div class="divider-switch3 "></div>
                <div class="divider-switch4 "></div>
            </div>
            <div class="container-title-2">
                <h4 >Mot de passe oublié</h4>
            </div>
        <form id="form" class="mx-auto col-8 mt-2" action="" method="post">
            <div class="container-title-2">
                <p>
                Super ! Vous avez franchi cette étape avec succès. Prenez le temps de choisir un nouveau mot de passe sécurisé. Nous sommes là pour vous assister si besoin !                </p>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Entrez votre nouveau mot de passe ici</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password2" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Confirmez votre nouveau mot de passe ici</label>
            </div>
            <div class="container-btn-mail mx-auto">
                <input type="submit" class="form-control mt-3 btn btn-warning text-light" value="Envoyer">
            </div>
        </form>
    </div>
    <div class="container-img-login d-none d-xl-block col-7"></div>
    </div>
            </form>
            <?php
            break;
        default:
            // code...
            break;
    }
    ?>
</body>
</html>
