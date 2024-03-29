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
&& !empty($_FILES['images'])
&& !empty($_POST['id_user'])
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
    $id = htmlspecialchars($_POST['id_user']); 

    $sql_car = "INSERT INTO car (state, car_brand, model, year, seat, kilometrage_limited, kilometrage_restricted , description, info_sup, bail, id_owner) VALUES (?,?,?,?,?,?,?,?,?,?,?) " ; 
    $stmt_car = $pdo->prepare($sql_car);
    $stmt_car -> execute([$etat, $brand, $model, $year, $seat, $kmr, $kms, $description, $info_sup, $bail, $id]);

    if($car_id = $pdo->lastInsertId()){

        $sql_car_address = "INSERT INTO address_car (street_name, neighborhood, city, region, zip_code, additional_description, id_car) VALUES (?,?,?,?,?,?,?) " ; 
        $stmt_car_address = $pdo->prepare($sql_car_address);
        $stmt_car_address -> execute([ $street_name, $neighborhood , $city, $region, $zip_code, $additional_description, $car_id]);

        $options = isset($_POST['options']) ? $_POST['options'] : array();
        $sql_equipment = "INSERT INTO car_equipment (id_equipment, id_car) VALUES (?,?) " ; 
        $stmt_car = $pdo->prepare($sql_equipment);
        foreach ($options as $option) {
            $stmt_car -> execute([$option, $car_id]);
        }

        //Limitation des fichiers à 5Mo (ici en octets)
        $maxFileSize = 5242880; 
        //On défini les extension valident pour l'upload des fichiers
        $valideFileExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'bmp'];
        //On compte le nombre d'images dans l'input files
        $imgNbr = count($_FILES['images']);

        for ($i = 0; $i < $imgNbr; $i++) {
            if (isset($_FILES['images']['error'][$i]) && $_FILES['images']['error'][$i] == 0) {
                //On vérifie que le fichier ne dépasse pas la taille autorisée
                if ($_FILES['images']['size'][$i] > $maxFileSize) {
                    throw new Exception("Votre image dépasse la taille maximale autorisée.");
                }
                //On récupère ensuite l'extension du fichier pour vérifier qu'elle est valide
                if (isset($_FILES['images']['name'][$i])) {
                    $originalImgName = $_FILES['images']['name'][$i];
                    $imgExtension = pathinfo($originalImgName, PATHINFO_EXTENSION);
        
                    // Vérifiez si l'extension est valide
                    if (!in_array($imgExtension, $valideFileExtensions)) {
                        throw new Exception("Votre fichier n'est pas dans un format valide.");
                    }
                } else {
                    throw new Exception("Le nom du fichier n'est pas défini.");
                }
                //Chemin vers le dossier pour stocker les images
                $uploadFolder = "../../img/upload/car";
                if (!is_dir($uploadFolder)) {
                    mkdir($uploadFolder, 0777, true);
                }
                
                //On créer un nouveau nom pour les fichiers upload
                $imgNewName = uniqid('IMG_', true) . "_" . time() . "." . $imgExtension;
                $uploadFile = $uploadFolder . $imgNewName;
        
                // Vérifiez si le fichier a été correctement téléchargé avant de le déplacer
                if (isset($_FILES['images']['tmp_name'][$i]) && is_uploaded_file($_FILES['images']['tmp_name'][$i])) {
                    // Déplacez le fichier téléchargé vers le répertoire de destination
                    if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $uploadFile)) {
                        // Le fichier a été correctement téléchargé et déplacé, continuez avec le traitement
                        $sql_img_car = "INSERT INTO car_picture (path, car_id) VALUES (?, ?)";
                        $stmt_img_car = $pdo->prepare($sql_img_car);
                        $stmt_img_car->execute([$imgNewName, $car_id]);
                    } else {
                        // Gérez l'erreur de déplacement de fichier
                        throw new Exception("Erreur lors du déplacement du fichier téléchargé.");
                    }
                } else {
                    // Gérez le cas où aucun fichier n'a été téléchargé ou qu'il y a une erreur
                    throw new Exception("Aucun fichier téléchargé ou erreur lors du téléchargement.");
                }
            }
        }       

        $imgNbr2 = count($_FILES['images_gray_card']);

        for ($i = 0; $i < $imgNbr2; $i++) {
            if (isset($_FILES['images_gray_card']['error'][$i]) && $_FILES['images_gray_card']['error'][$i] == 0) {
                //On vérifie que le fichier ne dépasse pas la taille autorisée
                if ($_FILES['images_gray_card']['size'][$i] > $maxFileSize) {
                    throw new Exception("Votre image dépasse la taille maximale autorisée.");
                }
                //On récupère ensuite l'extension du fichier pour vérifier qu'elle est valide
                if (isset($_FILES['images_gray_card']['name'][$i])) {
                    $originalImgName2 = $_FILES['images']['name'][$i];
                    $imgExtension2 = pathinfo($originalImgName2, PATHINFO_EXTENSION);
        
                    // Vérifiez si l'extension est valide
                    if (!in_array($imgExtension2, $valideFileExtensions)) {
                        throw new Exception("Votre fichier n'est pas dans un format valide.");
                    }
                } else {
                    throw new Exception("Le nom du fichier n'est pas défini.");
                }
                //Chemin vers le dossier pour stocker les images
                $uploadFolder2 = "../../img/upload/car";
                if (!is_dir($uploadFolder2)) {
                    mkdir($uploadFolder2, 0777, true);
                }
                
                //On créer un nouveau nom pour les fichiers upload
                $imgNewName2 = uniqid('IMG_', true) . "_" . time() . "." . $imgExtension2;
                $uploadFile2 = $uploadFolder2 . $imgNewName2;
        
                // Vérifiez si le fichier a été correctement téléchargé avant de le déplacer
                if (isset($_FILES['images_gray_card']['tmp_name'][$i]) && is_uploaded_file($_FILES['images_gray_card']['tmp_name'][$i])) {
                    // Déplacez le fichier téléchargé vers le répertoire de destination
                    if (move_uploaded_file($_FILES['images_gray_card']['tmp_name'][$i], $uploadFile2)) {
                        // Le fichier a été correctement téléchargé et déplacé, continuez avec le traitement
                        $sql_img_car2 = "INSERT INTO gray_card_picture_car (path, id_car) VALUES (?, ?)";
                        $stmt_img_car2 = $pdo->prepare($sql_img_car2);
                        $stmt_img_car2->execute([$imgNewName2, $car_id]);
                    } else {
                        // Gérez l'erreur de déplacement de fichier
                        sendMessage("Erreur lors du déplacement du fichier téléchargé.", "failed", "../../view/professional/add_car");
                    }
                } else {
                    // Gérez le cas où aucun fichier n'a été téléchargé ou qu'il y a une erreur
                    sendMessage("Aucun fichier téléchargé ou erreur lors du téléchargement.", "failed", "../../view/professional/add_car");
                }
            }
        }
    }else {
        sendMessage("Problème de base de données. Contactez immédiatement un administrateur !", "failed", "../../view/professional/add_car");
    }       
    sendMessage("L'annonce à bien était prit en compte", "success", "../../view\professional\advertisements");
}else {
    sendMessage("Veuillez remplir correctement les champs ", "failed", "../../view/professional/add_car");
}