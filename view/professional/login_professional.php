<?php
// Inclusion des fichiers nécessaires
include_once "../../controller/admin/role.php"; // Inclusion du fichier contenant les rôles de l'administrateur
include_once "../base.php"; // Inclusion du fichier de base pour la page
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "../../controller/admin/tools.php"; // Inclusion du fichier contenant des fonctions utilitaires pour l'administrateur

// Vérifiez si les champs de formulaire ne sont pas vides
if (!empty($_POST['mail']) && !empty($_POST['psw'])){
    $mail = $_POST['mail']; // Récupération de l'adresse e-mail du formulaire
    $sql = "SELECT * FROM professional WHERE mail='$mail'"; // Requête SQL pour sélectionner l'utilisateur professionnel avec l'adresse e-mail fournie
    $stmt = $pdo->query($sql); // Exécution de la requête SQL
    $pro = $stmt->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif

    if ($pro) {
        // le compte existe
        if (password_verify($_POST['psw'], $pro['psw'])) {
            // le mot de passe est correct
            $_SESSION["name"] = $user['name']; // Attribution du nom de l'utilisateur à la session
            $_SESSION["role"] = $user['role']; // Attribution du rôle de l'utilisateur à la session
            $_SESSION["token"] = bin2hex(random_bytes(16)); // Génération d'un jeton de sécurité et attribution à la session
            header('Location: ../home.php'); // Redirection vers la page d'accueil
        } else {
            sendMessage("Mots de passe incorrect", "failed", "login_particular.php"); // Redirection avec un message d'erreur si le mot de passe est incorrect
        }
    } else {
        // le compte n'existe pas
        sendMessage("le compte n'existe pas", "failed", "login_particular.php"); // Redirection avec un message d'erreur si le compte n'existe pas
    }
} else {
    // Attention bug.
    //sendMessage("Veuillez remplir correctement le formulaire", "failed", "login_particular.php");
}
?>

<!-- Partie HTML de la page -->
<h1 class="text-center mt-5 mb-5">Connexion</h1>

<?php include_once "../message.php" ?> <!-- Inclusion du fichier contenant le message -->

<form id="form" class="mx-auto col-6" action="" method="post">

    <label for="mail">Identifiant</label>
    <input class="form-control my-3" type="text" name="mail" placeholder="Veuillez renseigner votre mail">

    <label for="psw">Mots de passe</label>
    <input class="form-control my-3" type="password" name="psw">

    <input type="submit" class="form-control btn btn-secondary mt-3" value="Connexion">
</form>

</body>
</html>
