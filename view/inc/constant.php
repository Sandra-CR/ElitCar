<?php
// Connexion à la base de données

$db_host = "localhost";
$db_name = "omar";
$db_user= "root";
$db_password= "";

// Création objet PDO pour se connecter à la BDD

$pdo = new PDO("mysql:host=$db_host;db_name=$db_name;charset=utf8",$db_user,$db_password);

// Affichage des erreurs de connexion

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


?>