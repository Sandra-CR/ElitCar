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
