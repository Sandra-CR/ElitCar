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

function createCheckButtonKm(string $collumnName, string $dbValue, array $values, string $comp) : string {
    $result = '';
    $car_kml = [ "250Km" , "500Km", "750Km","1000Km","1250Km","1500Km","1750Km","2000Km","2250Km", "2500Km" ];
    
    foreach ($values as $value) {
        if($value === $dbValue){
            if ($dbValue == "0") {
                $result .= "<div class='form-check'> ";
                $result .= "<input class='form-check-input' id='radios' type='radio' name='$collumnName' checked value='0' >";
                $result .= "<label class='form-check-label' for='$collumnName'>Illimité</label></div>";
                $result .= "<div class='form-check'> ";
                $result .= "<input class='form-check-input'  id='radios' type='radio' name='$collumnName' value='1' >";
                $result .= "<label class='form-check-label' for='$collumnName'>Limité</label></div>";
                $result .= "<div class='adCar_kilometrage_select hidden mt-2'>";
                $result .= "<select class='form-select form-select-lg mb-3' name='kilometrage_select' id='kilometrageSelect'>";
                $result .= "    <option value=''>Choisissez une limite de kilométrage <span class='asterisk'>*</span></option>";
                $result .= "    <option value='0'>250 km</option>";
                $result .= "    <option value='1'>500 km</option>";
                $result .= "    <option value='2'>750 km</option>";
                $result .= "    <option value='3'>1000 km</option>";
                $result .= "    <option value='4'>1250 km</option>";
                $result .= "    <option value='5'>1500 km</option>";
                $result .= "    <option value='6'>1750 km</option>";
                $result .= "    <option value='7'>2000 km</option>";
                $result .= "    <option value='8'>2250 km</option>";
                $result .= "    <option value='9'>2500 km</option>";
                $result .= "</select>";
                $result .= "</div>";
            }
            }
            else if ($dbValue == "1") {
                $result .= "<div class='form-check'> ";
                $result .= "<input class='form-check-input' id='radios' type='radio' name='$collumnName' value='0' >";
                $result .=  "<label class='form-check-label' for='$collumnName'>Illimité</label></div>";
                $result .= "<div class='form-check'> ";
                $result .= "<input class='form-check-input' id='radios' type='radio' name='$collumnName' checked value='1' >";
                $result .=  "<label class='form-check-label' for='$collumnName'>Limité</label></div>";
                $result .= "<div class='adCar_kilometrage_select mt-2'>";
                $result .= "<select class='form-select form-select-lg mb-3' name='kilometrage_select' id='kilometrageSelect'>";
                foreach ($car_kml as $index => $kilm) {
                    if ($index == $comp) {
                        $result .=  "<option value='$index' selected>$kilm</option>";
                    }else {
                        $result .= "<option value='$index'>$kilm</option>";
                    }
                }
                $result .= "</select>";
                $result .= "</div>";
            }
        }
    // Ajoutez une sortie par défaut si aucune des conditions ci-dessus n'est remplie
    if ($result === '') {
        // La sortie par défaut est à définir ici
    }

    return $result;
}

