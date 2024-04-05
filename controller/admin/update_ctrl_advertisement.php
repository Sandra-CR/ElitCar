<?php
// Inclusion des fichiers nécessaires
include_once "../../model/pdo.php"; // Inclusion du fichier contenant la connexion à la base de données
include_once "tools.php"; // Inclusion du fichier contenant des fonctions utilitaires

if ( isset($_POST['state']) 
&& isset($_POST['car_brand']) 
&& !empty($_POST['model']) 
&& isset($_POST['year'])  
&& isset($_POST['seat']) 
&& isset($_POST['kilometrage_radio']) 
&& !empty($_POST['bail']) 
&& !empty($_POST['neighborhood']) 
&& !empty($_POST['city']) 
&& !empty($_POST['region'])
//&& !empty($_FILES['images'])
&& !empty($_POST['id_owner'])
&& !empty($_POST['id_car'])
) {
    $etat = htmlspecialchars($_POST['state']);
    $brand = htmlspecialchars($_POST['car_brand']);
    $model = htmlspecialchars($_POST['model']);
    $year = htmlspecialchars($_POST['year']);
    $seat = htmlspecialchars($_POST['seat']);
    $kmr = htmlspecialchars($_POST['kilometrage_radio']);
    $kms = htmlspecialchars($_POST['kilometrage_select']);

    $street_name = htmlspecialchars($_POST['street_name']);
    $neighborhood = htmlspecialchars($_POST['neighborhood']);
    $city = htmlspecialchars($_POST['city']);
    $region = htmlspecialchars($_POST['region']);
    $zip_code = htmlspecialchars($_POST['zip_code']);
    $additional_description = htmlspecialchars($_POST['additional_description']);

    //$option = htmlspecialchars($_POST['option']);
    $description = htmlspecialchars($_POST['description']);
    $info_sup = htmlspecialchars($_POST['info_sup']);
    $bail = htmlspecialchars($_POST['bail']);
    $idOwner = htmlspecialchars($_POST['id_owner']); 
    $idCar = htmlentities($_POST['id_car']);

    if ($kmr == "0") {
        $kms = "";
    }
    $sql_car = "UPDATE car SET state=?, car_brand=?, model=?, year=?, seat=?, kilometrage_limited=?, kilometrage_restricted=? , description=?, info_sup=?, bail=? WHERE id_car=? " ; 
    $stmt_car = $pdo->prepare($sql_car);
    $stmt_car -> execute([$etat, $brand, $model, $year, $seat, $kmr, $kms, $description, $info_sup, $bail, $idCar]);

    $sql_car_address = "UPDATE address_car SET street_name=?, neighborhood=?, city=?, region=?, zip_code=?, additional_description=? WHERE id_car=? " ; 
    $stmt_car_address = $pdo->prepare($sql_car_address);
    $stmt_car_address -> execute([ $street_name, $neighborhood , $city, $region, $zip_code, $additional_description, $idCar]);
       
    $sql = "DELETE FROM car_equipment WHERE id_car= $idCar";
    $stmt = $pdo->prepare($sql);
    if ( $stmt->execute() ) {
                
        $options = isset($_POST['options']) ? $_POST['options'] : array();
        $sql_equipment = "INSERT INTO car_equipment (id_equipment, id_car) VALUES (?,?) " ; 
        $stmt_car_equipement = $pdo->prepare($sql_equipment);
        foreach ($options as $option) {
            $stmt_car_equipement -> execute([$option, $idCar]);
        }
        //echo "Modification Effectué" ;
           sendMessage("Modification Effectué", "success", "../../view/professional/advertisements"); // Redirection vers la page d'accueil
     }else {
        //echo "Problème . Contactez immédiatement un administrateur !" ; 
         sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../view/professional/update_advertisement?id=$idCar");
    }
}else {
    //echo "Veuillez remplir correctement les champs ";
    sendMessage("Veuillez remplir correctement les champs ", "failed", "../../view/professional/update_advertisement?id=$idCar");
}