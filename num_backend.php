<?php

$servername = "localhost"; 
$username = "test123"; 
$password = "Test123@";
$dbname = "elitcar";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!empty($_POST["numero"])) {
        $numero = $_POST["numero"];

        
        $sql = "INSERT INTO numeros (numero) VALUES ('$numero')";

        
        if ($conn->query($sql) === TRUE) {
            echo "Numéro inséré avec succès";
        } else {
            echo "Erreur lors de l'insertion du numéro: " . $conn->error;
        }
    } else {
        echo "Veuillez fournir un numéro";
    }
}


$conn->close();
?>