<?php
function sendMessage(string $message, string $status, string $location, int|null $page = null, bool $hasAIdBefore = false): void {
    // S'il y a un ID avant, nous remplaçons le "?" de l'URL par un "&"
    $replace = !$hasAIdBefore ? "?" : "&";

    // Vérification si $page est null
    if ($page == null) {
        // Redirection vers l'emplacement avec les paramètres de message et de statut
        header("Location:$location" . $replace . "message=$message&status=$status");
        exit;
    } else {
        // Redirection vers l'emplacement avec les paramètres de page, message et statut
        header("Location:$location" . $replace . "page=$page&message=$message&status=$status");
        exit;
    }
}
function calculateAge($birthdate) {
    $dob = new DateTime($birthdate);
    $now = new DateTime();
    $age = $now->diff($dob);
    return $age->y;
}

function verif_mail($email) {
    $regex_mail = "/^(?=.{1,254}$)[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+=?^_`{|}~-]+)*@(?!-)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(?<!-)(?:\.[a-zA-Z]{2,})$/";
    // Vérification du domaine de l'e-mail
    $domain = explode('@', $email)[1];
    if (!checkdnsrr($domain, 'MX')) {
        return false;
    }
    return preg_match($regex_mail , $email);
}

function verif_mdp($mdp) {
    $regex = "#^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#";
    return preg_match($regex , $mdp);
}