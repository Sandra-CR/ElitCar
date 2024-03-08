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

<div class="container-main-login g-0 d-flex justify-content-center">
    <div class="container-login col-12 col-xl-5">
        <div class="container-logo"><a target="_self" href="view/home"><img src="img/elitcar-login.png" alt="" width="256px" height="64px"></a></div>
        <div class="container-title">
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="view/professional/login_professional.php">SE CONNECTER</a></h5>
            <h5 class=""><a target="_self" class="text-decoration-none text-dark" href="#">S'INSCRIRE</a></h5>
        </div>
        <div class="container-divider">
            <div class="divider-switch1 "></div>
            <div class="divider-switch2 off"></div>
        </div>
        <div class="container-title-2">
            <h4 >Inscription par mail</h4>
        </div>

        <h3 class="text-center" id="messagePro"></h3>

        <form id="formProfessional" action="controller/admin/create_ctrl_professional.php" method="post" class="mx-auto col-6">

            <div class="form-floating mt-3">
                <input type="text" name="name" class="form-control" id="floatingFname" placeholder="Prénom">
                <label for="floatingFName">Nom de Agence</label>
            </div>
            <div class="form-floating my-3">
                <input type="mail" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="psw" class="form-control" id="floatingPassword" placeholder="Mots de passe">
                <label for="floatingPassword">Mots de passe</label>
            </div>
            <div class="my-2">
                <input type="checkbox" id="show_password" onclick="togglePasswordVisibility()">
                <label for="show_password"><p class="text-label"> Afficher le mot de passe</p></label>
            </div>


            <div class="form-check my-2">
                <input class="form-check-input" type="checkbox" value="1" name="pol" id="politique">
                <label class="form-check-label" name="pol" for="politique">
                    <p class="text-label">
                        J’accepte la <a target="_self" class="text-decoration-none text-dark" href=""><b>politique de confidentialité</b></a> et <a target="_self" class="text-decoration-none text-dark" href=""><b>les conditions générales d’utilisations</b></a>
                    </p>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="new" id="newsletters" checked>
                <label class="form-check-label" name="new" for="newsletters">
                    <p class="text-label">
                    J'aimerais bénéficier des offres spéciales, promotions et nouvelles,
                    </p>
                </label>
            </div>
            
            <input class="form-control mt-3 btn btn-warning text-light" type="submit" value="Continuer">

        </form>
        <!-- Fin du formulaire HTML -->
    </div>
    <div class="container-img-login-pro d-none d-xl-block col-7 h-100"></div>
</div>
</body>
</html>


