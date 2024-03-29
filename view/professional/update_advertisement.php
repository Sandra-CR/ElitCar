<?php 
 include_once "../../controller/admin/role.php";
 include_once "../../controller/admin/tools.php";
 include_once "../../model/pdo.php"; 
 include_once "../include/base.php";
if (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value){
include_once "../include/professional/dashboard_professional.php";
if (isset ($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM car WHERE id_car ='$id'"; 
    $stmt = $pdo->query($sql); // Exécution de la requête SQL
    $car = $stmt->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif
    //$d = new DateTime($user['birthdate']);
    $sql2 = "SELECT * FROM address_car WHERE id_car = '$id'"; 
    $stmt2 = $pdo->query($sql2); // Exécution de la requête SQL
    $carAddress = $stmt2->fetch(PDO::FETCH_ASSOC);
    $sql3 = "SELECT * FROM car_equipment WHERE id_car = '$id'"; 
    $stmt3 = $pdo->query($sql3); // Exécution de la requête SQL
    $carEquipment = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    foreach ($carEquipment as $care) {
        $array_car_equipement[] = $care['id_equipment'];
        //array_push($array_car_equipement, $care['id_equipment']);
    }
    ?>
<section class="section_body"></section>
<h1 class="mx-5 my-4">Formulaire de renseignement de la voiture</h1>
<?php include_once "../message.php"; ?>
<section class="addCar_container d-flex">
    
    <main class="w-50">
        
        <form class="form" action="controller/admin/update_ctrl_advertisement.php" method="post" enctype="multipart/form-data">
            <section class="addCar_section my-4 mx-auto">
                <div class="border ">
                    <h2 class="my-3 ">Information sur le Véhicule</h2>
                    <div>
                        <h4>État <span class="asterisk">*</span></h4>
                        <select class="form-select form-select-lg mb-3" name="state" >
                            <?php
                        $state_array = ["neuf","très_bon", "bon", "moyen"];    
                        foreach ($state_array as $index => $state) {
                            if ($index == $car['state']) {
                                echo "<option value='$index' selected>$state</option>";
                            }else {
                                echo "<option value='$index'>$state</option>";
                            }
                        }
                        ?> 
                    </select>
                </div>
                <div>
                    <h4>Marque <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="car_brand" id="carBrand">
                        <?php
                        $car_brands = [
                            "ACURA", "ALFA ROMEO", "ASTON MARTIN", "AUDI", "BENTLEY", "BMW", "BUGATTI", "BUICK", "CADILLAC", "CHEVROLET", "CHRYSLER", "CITROËN", "DACIA", "DAEWOO", "DAIHATSU", "DODGE", "FERRARI", "FIAT", "FORD", "GENESIS", "GMC", "HONDA", "HUMMER", "HYUNDAI", "INFINITI", "ISUZU", "JAGUAR", "JEEP", "KIA", "LADA", "LAMBORGHINI", "LANCIA", "LAND ROVER", "LEXUS", "LOTUS", "MASERATI", "MAZDA", "MCLAREN", "MERCEDES-BENZ", "MG", "MINI", "MITSUBISHI", "NISSAN", "OPEL", "PEUGEOT", "PORSCHE", "RAM", "RENAULT", "ROLLS-ROYCE", "SAAB", "SAIC", "SEAT", "ŠKODA", "SMART", "SSANGYONG", "SUBARU", "SUZUKI", "TESLA", "TOYOTA", "TVR", "VAUXHALL", "VOLKSWAGEN", "VOLVO", "WIESMANN"
                        ];
                        foreach ($car_brands as $index => $brand) {
                            if ($index == $car['car_brand']) {
                                echo "<option value='$index' selected>$brand</option>";
                            }else {
                                echo "<option value='$index'>$brand</option>";
                            }
                        }
                        ?> 
                    </select>
                </div>
                <div>
                    <label for="model"><h4>Modèle de la voiture <span class="asterisk">*</span></h4></label>
                    <input type="text" name="model" value="<?= htmlentities($car['model'])?>" class="form-control">
                </div>
                <div>
                    <h4>Année de mise en circulation <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="year">
                        <?php
                        $car_year = [
                            "2024", "2023", "2022", "2021", "2020", "2019", "2018", "2017", "2016", "2015", "2014", "2013", "2012", "2011", "2010", "2009", "2008", "2007", "2006", "2005", "2004", "2003", "2002", "2001", "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990"
                        ];
                        foreach ($car_year as $index => $year) {
                            if ($index == $car['year']) {
                                echo "<option value='$index' selected>$year</option>";
                            }else {
                                echo "<option value='$index'>$year</option>";
                            }
                        }
                        ?> 
                    </select>
                </div>
                <div>
                    <h4>Nombre de places <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="seat" >
                        <?php
                        $car_seat = [ "2", "4", "5", "7" ];
                        foreach ($car_seat as $index => $seat) {
                            if ($index == $car['seat']) {
                                echo "<option value='$index' selected>$seat</option>";
                            }else {
                                echo "<option value='$index'>$seat</option>";
                            }
                        }
                        ?> 
                    </select>
                </div>
                <div class="adCar_kilometrage_radio fs-5">
                    <h4>Choisissez votre type de kilométrage <span class="asterisk">*</span></h4>
                    <?php
                    $kll =['0','1'];
                    echo createCheckButtonKm("kilometrage_radio", $car['kilometrage_limited'], $kll , $car['kilometrage_restricted'] );
                    ?>
                </div>
            </div>
        </section>
        <section class="addCar_section my-4 mx-auto fs-5">
            <div class="border">
                <h2 class="my-3 ">Localitation du Véhicule et Option</h2>
                <div>
                    <h4 for="">Adresse de la voiture/agence </span></h4>
                    <ul>
                        <li class="d-flex justify-content-between m-3">
                            <label for="street_name">Nom de rue</label>
                            <input type="text" name="street_name" value="<?= htmlentities($carAddress['street_name'])?>" class="form-control w-50 fs-5">
                        </li>
                        <li class="d-flex justify-content-between m-3">
                            <label for="neighborhood">Quartier <span class="asterisk">*</span></label>
                            <input type="text" name="neighborhood" value="<?= htmlentities($carAddress['neighborhood'])?>"  class="form-control w-50 fs-5">
                        </li>
                        <!-- <li class="d-flex justify-content-between m-3">
                            <label for="country">Pays <span class="asterisk">*</span></label>
                            <input type="text" name="country" class="form-control w-50 fs-5">
                        </li> -->
                        <li class="d-flex justify-content-between m-3">
                            <label for="city">Ville <span class="asterisk">*</span></label>
                            <input type="text" name="city" value="<?= htmlentities($carAddress['city'])?>"  class="form-control w-50 fs-5">
                        </li>
                        <li class="d-flex justify-content-between m-3">
                            <label for="region">Région <span class="asterisk">*</span></label>
                            <input type="text" name="region" value="<?= htmlentities($carAddress['region'])?>"  class="form-control w-50 fs-5">
                        </li>
                        <li class="d-flex justify-content-between m-3">
                            <label for="zip_code">Code Postal</label>
                            <input type="number" name="zip_code" value="<?= htmlentities($carAddress['zip_code'])?>"  class="form-control w-50 fs-5">
                        </li>
                        <li class="d-flex justify-content-between mx-3 fs-5">
                            <label for="additional_description">Complément d'adresse <br>(étage, n° d'appartements...)</label>
                            <input type="text" name="additional_description" value="<?= htmlentities($carAddress['additional_description'])?>"  class="form-control w-50 fs-5">
                        </li>
                    </ul>
                </div>
                <div>
                    <h4>Options du véhicule </span></h4>             
                    
                    <!-- Option Bluetooth -->
                    <ul>
                        <?php
                        $optionValue = ['Bluetooth', 'Climatisation', 'GPS', 'Carplay', 'Attache ISOFIX', 'Caméra de recul', 'Siège pour enfant', 'Toit ouvrant', 'Port USB', 'Porte-vélos', 'Décapotable', 'Android Auto', 'Entrée auxiliaire', 'Surveillance des angles morts', 'Sièges chauffants', 'Chargeur USB', 'Carte de péage', 'Traction intégrale', 'Accessible en fauteuil roulant', 'Accès sans clé'];
                        
                        foreach ($optionValue as $index => $optionName) {
                            $optionId = $index + 1; // Les valeurs des options commencent à 1
                            $isChecked = in_array($optionId, $array_car_equipement) ? "checked" : "";
                            
                            echo "
                            <li>
                            <input type='checkbox' value='$optionId' name='options[]' class='options form-check-input me-2' onchange='showRecap()' $isChecked>
                            <label for='options[]'>$optionName</label>
                            </li>";
                        }
                        
                        ?>
                </ul>
                <p id="recap"></p>
            </div> 
        </div>
    </section>
    <section class="addCar_section my-4 mx-auto fs-5">
        <div class="border">
            <h2 class="my-3">Complément d'information</h2>
            <!-- <div>
                <h4>Règlement du véhicule</h4>
                <ul>
                    <li>
                        <input type="checkbox" value="Animaux acceptés" name="settlement" class="reglement form-check-input me-2" onchange="showRecap2()">
                        <label for="settlement">Animaux acceptés</label>
                    </li>
                    <li>
                        <input type="checkbox" value="Animaux Interdit" name="settlement" class="reglement form-check-input me-2" onchange="showRecap2()">
                        <label for="settlement">Animaux Interdit</label>
                    </li>
                    <li>
                        <input type="checkbox" value="Fumeur Interdit" name="settlement" class="reglement form-check-input me-2" onchange="showRecap2()">
                        <label for="settlement">Fumeur Interdit</label>
                    </li>
                    <li>
                        <input type="checkbox" value="Fumeur Autorisée" name="settlement" class="reglement form-check-input me-2" onchange="showRecap2()">
                        <label for="settlement">Fumeur Autorisée</label>
                    </li>
                    <li>
                        <input type="checkbox" value="Permis Obligatoire" name="settlement" class="reglement form-check-input me-2" onchange="showRecap2()">
                        <label for="settlement">Permis Obligatoire</label>
                    </li>
                </ul>
                <p id="recap_reglement"></p>
            </div> -->
            <div>
                <h4>Déscription du véhicule</span></h4>
                <textarea cols="30" rows="5" name="description" class="form-control"><?= htmlentities($car['description'])?></textarea>
            </div>
            <div>
                <h4>Informations supplémentaires </span></h4>
                <textarea cols="30" rows="5" name="info_sup" placeholder="Sièges supplémentaires..." class="form-control"><?= htmlentities($car['info_sup'])?></textarea>
            </div>
            
            <div class="casse-caution my-3">
                <label for="bail">Caution <span class="asterisk">*</span></label>
                <input type="number" name="bail" placeholder="Caution en FCFA"  value="<?= htmlentities($car['bail'])?>" class="form-control form-control-lg fs-5">
            </div>
            
            
            <div class="casse-ajouter-une-photo my-4 fs-4">
                <label for="image_car" class="form-label ">Ajoutez des images de la voiture<span class="asterisk">*</span></label>
                <input class="form-control form-control-lg" type="file" name="images[]" multiple>
            </div>
            
            <div class="casse-ajouter-une-photo my-4 fs-4">
                <label for="images_gray_card" class="form-label ">Ajoutez l'image de la carte grise de la voiture recto/verso<span class="asterisk">*</span></label>
                <input class="form-control form-control-lg" type="file" name="images_gray_card[]"  multiple>
            </div>
            
            <input type="hidden" name="id_owner" value="<?= htmlentities($car['id_owner'])?>">
            <input type="hidden" name="id_car" value="<?= htmlentities($car['id_car'])?>">
            <div class="asterisk-container">
                <p><span class="asterisk">*</span> Champs obligatoires</p>
            </div>
            <div>
                <input type="submit" class="btn btn-primary fs-5">
            </div>
        </div>
    </section>
</form>

</main>


<aside class="w-50 me-4">
    <div class="row">
        <div class="col-lg-7">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <img src="img/grand.jpg" class="w-100" alt="">
                </div>
            </div>
            <div class="row mb-4 ">
                <div class="col-lg-6">
                    <img src="img/paysage.jpg" class="w-100" alt="">
                </div>
                <div class="col-lg-6">
                    <img src="img/paysage.jpg" class="w-100" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-5 my-4">
            <img src="img/image longue.jpg" class="w-100" alt="">
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-11 mb-4 mx-auto">
            <img src="img/grand.jpg" class="w-100" alt="">
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-6 mb-4">
            <img src="img/carré voiture.jpg" class="w-100" alt="">
        </div>
        <div class="col-lg-6 mb-4">
            <img src="img/carré voiture.jpg" class="w-100" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 mb-4 mx-auto">
            <img src="img/megane.jpg" class="w-100" alt="">
        </div>
    </div>
    
    <!-- <div class="mx-auto"> -->
        <div class="row ">
            <div class="col-lg-6 mb-4 ">
                <img src="img/image longue.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-6 my-4">
                <div class="row ">
                    <div class="col-lg-12 mb-4 ">
                        <img src="img/grand.jpg" class="w-100" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <img src="img/grand.jpg" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </aside>
    
</section>


<script>


const adCarKilometrageSelect = document.querySelector(".adCar_kilometrage_select");
const radios = document.querySelectorAll(".form-check-input");

radios.forEach(radio => {
    radio.addEventListener("click", function() {
        if (this.value === "1") {
            adCarKilometrageSelect.classList.remove("hidden");
        } else {
            adCarKilometrageSelect.classList.add("hidden");
        }
    });
});
    
</script>
<?php
    }else {
     sendMessage("Pas d'id", "failed", "../home.php", null);
    }
 }else{ 
     sendMessage("Page non autorisé", "failed", "../home.php", null);
    } 
    ?>