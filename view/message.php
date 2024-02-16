<?php
// Vérifie si les paramètres "status" et "message" sont définis dans la requête GET
if (isset($_GET["status"]) && isset($_GET["message"])){
    // Récupère les valeurs des paramètres "status" et "message"
    $status = $_GET["status"];
    $message = $_GET["message"];

    // Affiche le message avec la classe CSS correspondant au statut (success ou failed)
    echo "<h3 class='$status animation1 text-center'>$message</h3>";
}
?>

