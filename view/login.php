<?php
    include_once "../controller/admin/role.php";
    include_once "base.php";
    include_once "../model/pdo.php";
    include_once "../controller/admin/tools.php";

    if (!empty($_POST['mail']) && !empty($_POST['psw'])){
        $mail = $_POST['mail'];
        $sql = "SELECT * FROM particular WHERE mail='$mail'";
        $stmt = $pdo->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $user ) {
            // le compte existe
            if (password_verify($_POST['psw'], $user['psw'])) {
                $_SESSION["name"] = $user['first_name'] . " " . $user['last_name'];
                $_SESSION["role"] = $user['role'];
                $_SESSION["token"] = bin2hex(random_bytes(16)) ; // Token de securité en binaire changer en héxadécimal  
                header('Location: home.php');
            }else {
                sendMessage("Mot de passe incorrect", "failed", "login.php");
            }
        }else {
            // le compte n'existe pas
            sendMessage("le compte n'existe pas", "failed", "login.php");
        }
    }else {
        //sendMessage("Veuillez remplir correctement le formulaire", "failed", "login.php");
    }
?>
    <h1 class="text-center mt-5 mb-5">Connexion</h1>

    <?php include_once "message.php" ?>

    <form id="form" class="mx-auto col-6" action="" method="post">

        <label for="mail">Identifiant</label>
        <input class="form-control my-3" type="text" name="mail" placeholder="Veuillez renseigner votre mail">

        <label for="psw">Mots de passe</label>
        <input class="form-control my-3" type="password" name="psw">

        <input type="submit" class="form-control btn btn-secondary mt-3" value="Connexion">
    </form>