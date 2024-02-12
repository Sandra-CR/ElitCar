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
<div class="container-main-login d-lg-flex">
    <div class="container-login mx-auto col-12 col-lg-5">
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
            <h4 >Inscription par mail</h4>
        </div>

        <h3 class="text-center" id="message"></h3>

        <form id="form" class="mx-auto col-6">

            <div class="form-floating mb-3">
                <input type="text" name="first_name" class="form-control" id="floatingFname" placeholder="Prénom">
                <label for="floatingFName">Prénom</label>
            </div>
            <div class="form-floating">
                <input type="text" name="last_name" class="form-control" id="floatingName" placeholder="Nom">
                <label for="floatingName">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="mail" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="psw" class="form-control" id="floatingPassword" placeholder="Mots de passe">
                <label for="floatingPassword">Mots de passe</label>
            </div>
            
            <input class="form-control mt-3 btn btn-warning text-light" type="submit" value="Continuer">

        </form>
        <!-- Fin du formulaire HTML -->
    </div>
    <div class="container-img-login d-none d-lg-block col-7"></div>
</div>

</body>
</html>

<script>
    // Récupération du formulaire et de l'élément d'affichage du message
    const form = document.getElementById('form');
    const msg = document.getElementById('message');

    // Ajout d'un écouteur d'événement pour soumettre le formulaire
    form.addEventListener("submit", function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du formulaire

        const formData = new FormData(e.target); // Récupération des données du formulaire

        const data = {
            method: "POST",
            body: formData,
        };

        // Envoi des données du formulaire via une requête fetch
        fetch("controller/admin/ajax_create_ctrl_particular.php", data)
            .then(response => response.json()) // Conversion de la réponse en format JSON
            .then(data => {
                console.log(data); // Affichage des données reçues dans la console
                msg.innerHTML = data.message; // Affichage du message de la réponse
            });
    });
</script>
