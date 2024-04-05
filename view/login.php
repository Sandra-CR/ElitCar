<?php
include_once "../model/pdo.php";
include_once "../controller/admin/tools.php";
session_start();

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    // Utilisateur déjà connecté
    // Redirigez-le vers la page d'accueil ou toute autre page de votre application
    header("Location: /home");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elitcar">
    <base href="http://localhost/ElitCar/" target="_blank">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="js/main.js"></script>
    <title>ElitCar</title>
</head>
<body>
<div class="container-main-login d-flex g-0 justify-content-center ">
    <div class="container-login col-12 col-xl-5">
        <div class="container-logo"><a target="_self" href="view/home"><img src="img/elitcar-login.png" alt="" width="256px" height="64px"></a></div>
        <div class="container-title">
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/particular/login_particular">SE CONNECTER</a></h5>
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/login">S'INSCRIRE</a></h5>
        </div>
        <div class="container-divider">
            <div class="divider-switch1 "></div>
            <div class="divider-switch2 off"></div>
        </div>
        <div class="container-title-2">
            <h4 >Créez votre compte</h4>
        </div>
        <div class="container-btn">
            <button class="btn-log-google border border-2 my-1" onclick="redirectToGoogle()"><img class="mx-1" src="img/google.jpg" width="23px" height="23px" alt=""> Continuer avec Google</button>
            <!-- <button class="btn-log btn-secondary my-1">Facebook</button>
            <button class="btn-log btn-secondary my-1">Apple</button> -->
        </div>
        <div class="container-choose">
            <p>ou</p>
        </div>
        <div class="container-btn-mail mx-auto">
            <a target="_self" href="view/particular/create_particular"><button class="btn-log-mail border border-2 my-1">Inscription par mail</button></a>
        </div>
        <div class="container-title">
            <p>Vous avez un compte sur Elitcar? <a href="view/forgot" target="_self" class="mx-2 fw-bold text-decoration-none text-dark"> Se connecter</a></p>
        </div>
    </div>
    <div class="container-img-login d-none d-xl-block col-7 h-100"></div>
</div>
<script>
function redirectToGoogle() {
    window.location.href = 'https://accounts.google.com/o/oauth2/auth?client_id=940497895444-tb4oe307ftrctvr8vl4mrnkvgtegpa35.apps.googleusercontent.com&redirect_uri=http://localhost/ElitCar/view/home&response_type=code&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email';
}
// Fonction pour rediriger l'utilisateur vers la connexion via Apple
// function redirectToApple() {
//     // Rediriger l'utilisateur vers la page de connexion via Apple
//     window.location.href = '/votre-page-de-connexion-via-apple'; // Remplacez '/votre-page-de-connexion-via-apple' par l'URL de votre page de connexion via Apple
// }
</script>