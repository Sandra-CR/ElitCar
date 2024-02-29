<?php
include_once "include/base.php";
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
            <h4 >Nous sommes contents de vous revoir</h4>
        </div>
        <div class="container-btn">
            <button class="btn-log btn-secondary my-1">Google</button>
            <button class="btn-log btn-secondary my-1">Facebook</button>
            <button class="btn-log btn-secondary my-1">Apple</button>
        </div>
        <div class="container-choose mt-2">
            <p>ou</p>
        </div>
        <?php include_once "../message.php" ?> <!-- Inclusion du fichier contenant le message -->

        <form id="form" class="mx-auto col-8 mt-2" action="" method="post">

            <div class="form-floating mb-3">
                <input type="mail" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="psw" class="form-control" id="floatingPassword" placeholder="Mots de passe">
                <label for="floatingPassword">Mots de passe</label>
            </div>
            <div class="my-2">
                <input type="checkbox" id="show_password" onclick="togglePasswordVisibility()">
                <label for="show_password"><p class="text-label">Afficher le mot de passe</p></label>
            </div>
            <div class="container-title-3 my-2">
                <a href="view/login" target="_self" class="mt-3 fw-bold text-decoration-none text-dark">Mot de passe oublié?</a>
            </div>
            <div class="container-btn-mail mx-auto">
                <input type="submit" class="form-control mt-3 btn btn-warning text-light" value="Connexion">
            </div>
        </form>
    </div>
    <div class="container-img-login d-none d-xl-block col-7"></div>

</div>

<?php
include_once "include/footer.php";
?>