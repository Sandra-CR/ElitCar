<?php 
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
include_once "../include/professional/dashboard_professional.php";
?>
<section class="section_body"></section>
<h1 class="mx-5 my-4">Formulaire de renseignement de la voiture</h1>
<?php include_once "../message.php"; ?>
<section class="addCar_container d-flex">
    
<main class="w-50">
    
    <form class="form" action="controller/admin/create_ctrl_car_annonce.php" method="post" enctype="multipart/form-data">
        <section class="addCar_section my-4 mx-auto">
            <div class="border-1">
                <h2 class="my-3 ">Information sur le Véhicule</h2>
            <div>
                    <h4>État <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="state" >
                        <option value="">État du véhicule</option>
                        <option value="0">Neuf</option>
                        <option value="1">Très bon état</option>
                        <option value="2">Bon état</option>
                        <option value="3">État moyen</option>
                    </select>
                </div>
                <div>
                    <h4>Marque <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="car_brand" id="carBrand">
                        <option value="">Marque de votre voiture</option>
                        <option value="0">ACURA</option>
                        <option value="1">ALFA ROMEO</option>
                        <option value="2">ASTON MARTIN</option>
                        <option value="3">AUDI</option>
                        <option value="4">BENTLEY</option>
                        <option value="5">BMW</option>
                        <option value="6">BUGATTI</option>
                        <option value="7">BUICK</option>
                        <option value="8">CADILLAC</option>
                        <option value="9">CHEVROLET</option>
                        <option value="10">CHRYSLER</option>
                        <option value="11">CITROËN</option>
                        <option value="12">DACIA</option>
                        <option value="13">DAEWOO</option>
                        <option value="14">DAIHATSU</option>
                        <option value="15">DODGE</option>
                        <option value="16">FERRARI</option>
                        <option value="17">FIAT</option>
                        <option value="18">FORD</option>
                        <option value="19">GENESIS</option>
                        <option value="20">GMC</option>
                        <option value="21">HONDA</option>
                        <option value="22">HUMMER</option>
                        <option value="23">HYUNDAI</option>
                        <option value="24">INFINITI</option>
                        <option value="25">ISUZU</option>
                        <option value="26">JAGUAR</option>
                        <option value="27">JEEP</option>
                        <option value="28">KIA</option>
                        <option value="29">LADA</option>
                        <option value="30">LAMBORGHINI</option>
                        <option value="31">LANCIA</option>
                        <option value="32">LAND ROVER</option>
                        <option value="33">LEXUS</option>
                        <option value="34">LOTUS</option>
                        <option value="35">MASERATI</option>
                        <option value="36">MAZDA</option>
                        <option value="37">MCLAREN</option>
                        <option value="38">MERCEDES-BENZ</option>
                        <option value="39">MG</option>
                        <option value="40">MINI</option>
                        <option value="41">MITSUBISHI</option>
                        <option value="42">NISSAN</option>
                        <option value="43">OPEL</option>
                        <option value="44">PEUGEOT</option>
                        <option value="45">PORSCHE</option>
                        <option value="46">RAM</option>
                        <option value="47">RENAULT</option>
                        <option value="48">ROLLS-ROYCE</option>
                        <option value="49">SAAB</option>
                        <option value="50">SAIC</option>
                        <option value="51">SEAT</option>
                        <option value="52">ŠKODA</option>
                        <option value="53">SMART</option>
                        <option value="54">SSANGYONG</option>
                        <option value="55">SUBARU</option>
                        <option value="56">SUZUKI</option>
                        <option value="57">TESLA</option>
                        <option value="58">TOYOTA</option>
                        <option value="59">TVR</option>
                        <option value="60">VAUXHALL</option>
                        <option value="61">VOLKSWAGEN</option>
                        <option value="62">VOLVO</option>
                        <option value="63">WIESMANN</option>
                    </select>
                </div>
                <div>
                    <label for="model"><h4>Modèle de la voiture <span class="asterisk">*</span></h4></label>
                    <input type="text" name="model" class="form-control">
                </div>
                <div>
                    <h4>Année de mise en circulation <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="year">
                        <option value="">Année de mise en circulation</option>
                        <option value="0">2024</option>
                        <option value="1">2023</option>
                        <option value="2">2022</option>
                        <option value="3">2021</option>
                        <option value="4">2020</option>
                        <option value="5">2019</option>
                        <option value="6">2018</option>
                        <option value="7">2017</option>
                        <option value="8">2016</option>
                        <option value="9">2015</option>
                        <option value="10">2014</option>
                        <option value="11">2013</option>
                        <option value="12">2012</option>
                        <option value="13">2011</option>
                        <option value="14">2010</option>
                        <option value="15">2009</option>
                        <option value="16">2008</option>
                        <option value="17">2007</option>
                        <option value="18">2006</option>
                        <option value="19">2005</option>
                        <option value="20">2004</option>
                        <option value="21">2003</option>
                        <option value="22">2002</option>
                        <option value="23">2001</option>
                        <option value="24">2000</option>
                        <option value="25">1999</option>
                        <option value="26">1998</option>
                        <option value="27">1997</option>
                        <option value="28">1996</option>
                        <option value="29">1995</option>
                        <option value="30">1994</option>
                        <option value="31">1993</option>
                        <option value="32">1992</option>
                        <option value="33">1991</option>
                        <option value="34">1990</option>
                    </select>
                </div>
                <div>
                    <h4>Nombre de places <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="seat" >
                        <option value="">Nombres de places </option>
                        <option value="0">2</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                        <option value="3">7</option>
                    </select>
                </div>
                
                <div class="adCar_kilometrage_radio fs-5">
                    <h4>Choisissez votre type de kilométrage <span class="asterisk">*</span></h4>

                    <div>
                    <input type="radio" id="illimite" name="kilometrage_radio" value="0" class="form-check-input"/>
                    <label for="kilometrage_radio">Illimité</label>
                    </div>
            
                    <div>
                    <input type="radio" id="limite" name="kilometrage_radio" value="1" class="form-check-input" />
                    <label for="kilometrage_radio">Limité</label>
                    </div>
                </div>

                <div class="adCar_kilometrage_select hidden mt-2">
                    <!-- <label for="kilometrageSelect">:</label> -->
                    <select class="form-select form-select-lg mb-3" name="kilometrage_select" id="kilometrageSelect">
                        <option value="">Choisissez une limite de kilométrage <span class="asterisk">*</span></option>
                        <option value="0">250 km</option>
                        <option value="1">500 km</option>
                        <option value="2">750 km</option>
                        <option value="3">1000 km</option>
                        <option value="4">1250 km</option>
                        <option value="5">1500 km</option>
                        <option value="6">1750 km</option>
                        <option value="7">2000 km</option>
                        <option value="8">2250 km</option>
                        <option value="9">2500 km</option>
                    </select>
                </div>
            </div>
        </section>
        <section class="addCar_section my-4 mx-auto fs-5">
            <div class="border-1">
            <h2 class="my-3 ">Localitation du Véhicule et Option</h2>
                <div>
                    <h4 for="">Adresse de la voiture/agence </span></h4>
                        <ul>
                            <li class="d-flex justify-content-between m-3">
                                <label for="street_name">Nom de rue</label>
                                <input type="text" name="street_name" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="neighborhood">Quartier <span class="asterisk">*</span></label>
                                <input type="text" name="neighborhood" class="form-control w-50 fs-5">
                            </li>
                            <!-- <li class="d-flex justify-content-between m-3">
                                <label for="country">Pays <span class="asterisk">*</span></label>
                                <input type="text" name="country" class="form-control w-50 fs-5">
                            </li> -->
                            <li class="d-flex justify-content-between m-3">
                                <label for="city">Ville <span class="asterisk">*</span></label>
                                <input type="text" name="city" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="region">Région <span class="asterisk">*</span></label>
                                <input type="text" name="region" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="zip_code">Code Postal</label>
                                <input type="number" name="zip_code" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between mx-3 fs-5">
                                <label for="additional_description">Complément d'adresse <br>(étage, n° d'appartements...)</label>
                                <input type="text" name="additional_description" class="form-control w-50 fs-5">
                            </li>
                        </ul>
                </div>
                <div>
                <h4>Options du véhicule </span></h4>             
                
                <!-- Option Bluetooth -->
                <ul>
                    <li>
                        <input type="checkbox" value="1" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Bluetooth</label>
                    </li>
                <!-- Option Climatisation -->
                    <li>
                        <input type="checkbox" value="2" name="options[]" class="options form-check-input me-2" onchange="showRecap()"> 
                        <label for="options[] ">Climatisation</label>
                    </li>
                <!-- Option GPS -->
                    <li>
                        <input type="checkbox" value="3" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">GPS</label>
                    </li>
                <!-- Option Carplay, Android Auto -->
                    <li>
                        <input type="checkbox" value="4" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Carplay</label>
                    </li>
                <!-- Option Attache ISOFIX -->
                    <li>
                        <input type="checkbox" value="5" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Attache ISOFIX</label>
                    </li>
                <!-- Option Caméra de recul -->
                    <li>
                        <input type="checkbox" value="6" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Caméra de recul</label>
                    </li>
                <!-- Option Siège pour enfant -->    
                    <li>
                        <input type="checkbox" value="7" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="option">Siège pour enfant</label>
                    </li>
                    <!-- Option Toit ouvrant -->    
                    <li>
                        <input type="checkbox" value="8" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Toit ouvrant</label>
                    </li>
                    <!-- Option Port USB -->    
                    <li>
                        <input type="checkbox" value="9" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Port USB</label>
                    </li>
                    <!-- Option Porte-vélos -->    
                    <li>
                        <input type="checkbox" value="10" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Porte-vélos</label>
                    </li>
                    <!-- Option Décapotable -->    
                    <li>
                        <input type="checkbox" value="11" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Décapotable</label>
                    </li>
                    <!-- Option Android Auto -->    
                    <li>
                        <input type="checkbox" value="12" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Android Auto</label>
                    </li>
                    <!-- Option Entrée auxiliaire -->    
                    <li>
                        <input type="checkbox" value="13" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Entrée auxiliaire</label>
                    </li>
                    <!-- Option Surveillance des angles morts -->    
                    <li>
                        <input type="checkbox" value="14" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Surveillance des angles morts</label>
                    </li>
                    <!-- Option Sièges chauffants -->    
                    <li>
                        <input type="checkbox" value="15" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Sièges chauffants</label>
                    </li>
                    <!-- Option Chargeur USB -->    
                    <li>
                        <input type="checkbox" value="16" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Chargeur USB</label>
                    </li>
                    <!-- Option Carte de péage -->
                    <li>
                        <input type="checkbox" value="17" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Carte de péage</label>
                    </li>
                     <!-- Option Traction intégrale -->
                     <li>
                        <input type="checkbox" value="18" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Traction intégrale</label>
                    </li>
                    <!-- Option Accessible en fauteuil roulant -->
                    <li>
                        <input type="checkbox" value="19" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Accessible en fauteuil roulant</label>
                    </li>
                    <!-- Option Accès sans clé -->
                    <li>
                        <input type="checkbox" value="20" name="options[]" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="options[] ">Accès sans clé</label>
                    </li>
                </ul>
                    <p id="recap"></p>
                </div> 
            </div>
        </section>
        <section class="addCar_section my-4 mx-auto fs-5">
            <div class="border-1">
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
                    <textarea cols="30" rows="5" name="description" class="form-control"></textarea>
                </div>
                <div>
                    <h4>Informations supplémentaires </span></h4>
                    <textarea cols="30" rows="5" name="info_sup" placeholder="Sièges supplémentaires..." class="form-control"></textarea>
                </div>

                <div class="casse-caution my-3">
                    <label for="bail">Caution <span class="asterisk">*</span></label>
                    <input type="number" name="bail" placeholder="Caution en FCFA" class="form-control form-control-lg fs-5">
                </div>


                <div class="casse-ajouter-une-photo my-4 fs-4">
                <label for="image_car" class="form-label ">Ajoutez des images de la voiture<span class="asterisk">*</span></label>
                <input class="form-control form-control-lg" type="file" name="images[]" multiple>
                </div>

                <div class="casse-ajouter-une-photo my-4 fs-4">
                <label for="images_gray_card" class="form-label ">Ajoutez l'image de la carte grise de la voiture recto/verso<span class="asterisk">*</span></label>
                <input class="form-control form-control-lg" type="file" name="images_gray_card[]"  multiple>
                </div>

                <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
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

function showRecap() {
    // Sélectionne toutes les cases à cocher avec la classe "options form-check-input me-2"
    var checkboxes = document.querySelectorAll(".options");
    // Sélectionne l'élément pour afficher le récapitulatif
    var recapElement = document.getElementById("recap");
    
    // Initialise une liste pour stocker les options sélectionnées
    var selectedOptions = [];

    // Parcourt toutes les cases à cocher
    checkboxes.forEach(function(checkbox) {
        // Vérifie si la case à cocher est cochée
        if (checkbox.checked) {
            // Ajoute la valeur de la case à cocher à la liste des options sélectionnées
            selectedOptions.push(checkbox.value);
        }
    });

    // Affiche le récapitulatif
    recapElement.innerText = "Options sélectionnées : " + selectedOptions.join(', ');
}

function showRecap2() {
    // Sélectionne toutes les cases à cocher avec la classe "options form-check-input me-2"
    var checkboxes = document.querySelectorAll(".reglement");
    // Sélectionne l'élément pour afficher le récapitulatif
    var recapElement = document.getElementById("recap_reglement");
    
    // Initialise une liste pour stocker les options sélectionnées
    var selectedOptions = [];

    // Parcourt toutes les cases à cocher
    checkboxes.forEach(function(checkbox) {
        // Vérifie si la case à cocher est cochée
        if (checkbox.checked) {
            // Ajoute la valeur de la case à cocher à la liste des options sélectionnées
            selectedOptions.push(checkbox.value);
        }
    });

    // Affiche le récapitulatif
    recapElement.innerText = "Options sélectionnées : " + selectedOptions.join(', ');
}


    const adCarKilometrageSelect = document.querySelector(".adCar_kilometrage_select");
    const limite = document.querySelector("#limite");
    const illimite = document.querySelector("#illimite");

    limite.addEventListener("click" , function(){
        adCarKilometrageSelect.classList.remove("hidden");
    })


    illimite.addEventListener("click" , function(){
        adCarKilometrageSelect.classList.add("hidden");
    })

    
</script>