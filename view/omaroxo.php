<?php 

session_start();
$errors = array();
// Inclusion du fichier mail.php qui contient probablement des fonctions liées à l'envoi de courriels
require "mail.php";
// Inclusion du fichier constants.inc.php, probablement contenant des constantes utiles
include_once ("inc/constant.php");
try {
    // Tentative de connexion à la base de données MySQL avec des paramètres définis dans les constantes
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Affiche un message d'erreur en cas d'échec de la connexion
} catch (PDOException $e) {
    die("la connexion n'est pas etablie: " . $e->getMessage());
}

$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

if (count($_POST) > 0) {
    switch ($mode) {
        case 'enter_email':
            // code...
            $email = $_POST['mail'];
            // Vérification de la validité de l'adresse e-mail et ajout d'une erreur si elle est invalide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = " veillez inserer un email valide";
                // Vérification si l'adresse e-mail existe dans la base de données et ajout d'une erreur si non
            } elseif (!valid_email($pdo, $email)) {
                $errors[] = "veillez inserer un email valide";

                 // Envoi d'un courriel de réinitialisation
            } else {
                $_SESSION['forgot']['mail'] = $email;
                send_email($pdo, $email);
                // Redirection vers la page de saisie du code
                header("Location: forgot.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
           
            $code = $_POST['code'];
            $result = is_code_correct($pdo, $code);

            if ($result === "le code est correcte") {
                $_SESSION['forgot']['code'] = $code;
                 // Redirection vers la page de saisie du nouveau mot de passe
                header("Location: forgot.php?mode=enter_password");
                die;
            } else {
                // Ajout d'une erreur si le code saisi n'est pas correct
                $errors[] = $result;
            }
            break;

        case 'enter_password':
  
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            // Vérification si les mots de passe saisis sont identiques
            if ($password !== $password2) {
                $errors[] = "les mots de passes ne sont pas identiques";
            } elseif (!isset($_SESSION['forgot']['mail']) || !isset($_SESSION['forgot']['code'])) {
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
                header("Location: connexion.php");
                die;
            }
            break;

        default:
            // code...
            break;
    }
}

// Fonction d'envoi de courriel pour la réinitialisation de mot de passe

function send_email($pdo, $email) {
    // Durée de validité du code (2 minutes)
    $expire = time() + (60 * 2);
     // Génération d'un code aléatoire
    $code = rand(10000, 99999);
    $email = addslashes($email);

    $query = "INSERT INTO codes (mail, code, expire) VALUES (:mail, :code, :expire)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':mail', $email);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':expire', $expire);
    $stmt->execute();
// Envoi du courriel contenant le code
    send_mail($email, 'réinitialisation de mot mot de passe', 'votre code est : '. $code);
}


// Fonction de sauvegarde du nouveau mot de passe dans la base de données

function save_password($pdo, $password) {
    $email = addslashes($_SESSION['forgot']['mail']);
     // Utilisation de la fonction password_hash pour sécuriser le mot de passe (commentée ici)
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // Utilisation de sha1 et md5 pour l'encodage du mot de passe (commenté ici)
    $password = sha1(md5($password) . md5($password)); // Fix: use $password instead of $pass

    $query = "UPDATE users SET password = :password WHERE mail = :mail";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
}


// Fonction de vérification de l'existence de l'adresse e-mail dans la base de données
function valid_email($pdo, $email) {
    $query = "SELECT * FROM users WHERE mail = :mail LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

// Fonction de vérification de la validité du code saisi
function is_code_correct($pdo, $code) {
    $expire = time();
    $email = addslashes($_SESSION['forgot']['mail']);

    $query = "SELECT * FROM codes WHERE code = :code AND mail = :mail ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['expire'] > $expire) {
            return "le code est correcte";
        } else {
            return "le code à expiré";
        }
    } else {
        return "le code n'est pas correcte";
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
    <!-- <style>
        * {
            font-family: "Inter", sans-serif;
            font-size: 14px;
        }
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            width: 626px;
            min-height: 416px;
        }
        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            /* color: #FFAA00; */
            /* text-align: center; */
            margin: 0;
            padding-bottom: 30px;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 96%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"], input[type="button"] {
            background-color: #FFAA00;
            border: none;
            color: #fff;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]{
            margin-bottom: 10px;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #FFAA0080;
        }
        a {
            color: black;
            text-decoration: none;
        }
        .divpourmes{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .mesforget{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 638px;
            height: 73px;
            background-color: #FFAA0080;
            border-radius: 3px;
        }
        .mespar{
            font-size: 12px;
            font-family: "Inter", sans-serif;
            font-style: normal;
            padding: 5px;
            width: 80%;
        }
    </style> -->

    <?php
    switch ($mode) {
        case 'enter_email':
            // code...
            ?>
        <form class="num-form" method="post" action="forgot.php?mode=enter_email">
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
        <form id="form" class="mx-auto col-8 mt-2" action="" method="post">
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
            <form class="formpassword" method="post" action="forgot.php?mode=enter_code">
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
                <input type="text" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
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
            <form class="formpassword" method="post" action="forgot.php?mode=enter_password">
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
                <input type="password" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Entrez votre nouveau mot de passe ici</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
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
