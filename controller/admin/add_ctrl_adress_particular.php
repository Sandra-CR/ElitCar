<?php
include "../../model/pdo.php"; // Inclut le fichier de connexion à la base de données
include "tools.php";
    
// Vos variables récupérées du formulaire
$votrerue = htmlspecialchars($_POST['street_name']); // Récupère et nettoie la valeur de l'entrée "votrerue" du formulaire
    
$quartier = htmlspecialchars($_POST['neighborhood']); // Récupère et nettoie la valeur de l'entrée "quartier" du formulaire

$ville = htmlspecialchars($_POST['city']); // Récupère et nettoie la valeur de l'entrée "ville" du formulaire
    
$region = htmlspecialchars($_POST['region']); // Récupère et nettoie la valeur de l'entrée "region" du formulaire
    
$codepostale = htmlspecialchars($_POST['postal_code']); // Récupère et nettoie la valeur de l'entrée "codepostale" du formulaire
    
$descrisup = htmlspecialchars($_POST['additional_description']); // Récupère et nettoie la valeur de l'entrée "descrisup" du formulaire
    
$id = $_POST["id_user"];

    // Validation des valeurs non vides
if (!empty($quartier) || !empty($ville) || !empty($region) || !empty($codepostale)) {
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
            // Requête préparée pour l'insertion des données
        $insertStmt = $pdo->prepare("INSERT INTO address_particulier (street_name, neighborhood, city, region, postal_code, additional_description, id_user) VALUES (:street_name, :neighborhood, :city, :region, :postal_code, :additional_description, :id_user)");
        
        // Liaison des paramètres
        $insertStmt->bindParam(':street_name', $votrerue); // Associe la variable $votrerue au paramètre :street_name de la requête
        $insertStmt->bindParam(':neighborhood', $quartier); // Associe la variable $quartier au paramètre :neighborhood de la requête
        $insertStmt->bindParam(':city', $ville); // Associe la variable $ville au paramètre :city de la requête
        $insertStmt->bindParam(':region', $region); // Associe la variable $region au paramètre :region de la requête
        $insertStmt->bindParam(':postal_code', $codepostale); // Associe la variable $codepostale au paramètre :postal_code de la requête
        $insertStmt->bindParam(':additional_description', $descrisup); // Associe la variable $descrisup au paramètre :additional_description de la requête
        $insertStmt->bindParam(':id_user', $id);
        // Exécution de la requête
        $insertStmt->execute(); // Exécute la requête d'insertion des données dans la base de données
        sendMessage("Adresse postale ajoutee avec succes", "success", "../../view/particular/adress_particular"); // Affiche un message de succès après l'insertion des données
        
    } catch (PDOException $e) {
        error_log("Erreur PDO: " . $e->getMessage(), 0); // Enregistre l'erreur PDO dans le journal des erreurs
        sendMessage("Une erreur s'est produite lors de l'ajout de l'adresse postale. Veuillez reessayer plus tard.", "failed", "../../view/particular/adress_particular"); // Affiche un message d'erreur en cas d'échec de l'insertion des données
    } finally {
        $pdo = null; // Ferme la connexion à la base de données
    }
}else {
    sendMessage("Veuillez remplir tous les champs du formulaire.", "failed", "../../view/particular/adress_particular"); // Affiche un message d'erreur si l'un des champs du formulaire est vide
}
?>
    
    
    