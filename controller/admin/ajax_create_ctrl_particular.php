<?php
include_once "../../model/pdo.php";
include_once "tools.php";

// Fonction pour vérifier le mot de passe
// function verif_mdp($mdp) {
//     $regex = '/^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%*#?&]{8,}$/';
//     return preg_match($regex , $mdp);
// }

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["mail"]) && !empty($_POST["psw"])) {
    $pp = "../../img/no_picture_update.svg";
    $psw = $_POST["psw"];

    // Vérifier si le mot de passe respecte les critères
    // if (verif_mdp($psw)) {
        $psw = password_hash($psw, PASSWORD_ARGON2I);
        $role = "1";
        try {
            $sql = "INSERT INTO particular (first_name, last_name, mail, psw, profile_picture, role) VALUE (?,?,?,?,?,?) " ; 
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST["first_name"], $_POST["last_name"], $_POST["mail"], $psw,
            $pp , $role]);
            $response = [
                "status" => "success",
                "message" => "Utilisateur Créer"
              ];
        } catch (Exception $error) {
            $response = [
                "status" => "failed",
                "message" => "Probleme de bdd Contactez immédiatement un Admin !"
              ];
        }
    // } else {
    //     $response = [
    //         "status" => "failed",
    //         "message" => "Le mot de passe doit contenir au moins 8 caractères avec au moins une majuscule et au moins un chiffre."
    //       ];
    // }
} else {
    $response = [
        "status" => "failed",
        "message" => "Veuillez remplir correctement les champs"
      ];
}
echo json_encode($response); 
?>
