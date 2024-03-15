<?php 
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
?>
<section class="section_body"></section>
<h1 class="mx-5 my-4">Formulaire de renseignement de la voiture</h1>
<section class="addCar_container d-flex">
    
<main class="w-50">
    


    

    
    <form action="">
        <section class="addCar_section my-4 mx-auto">
            <div class="border ">
            <div>
                    <h4>État <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" >
                        <option value="">État du véhicule</option>
                        <option value="neuf">Neuf</option>
                        <option value="très_bon">Très bon état</option>
                        <option value="bon">Bon état</option>
                        <option value="moyen">État moyen</option>
                    </select>
                </div>
                <div>
                    <h4>Marque <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" name="carBrand" id="carBrand">
                        <option value="">Marque de votre voiture</option>
                        <option value="ACURA">ACURA</option>
                        <option value="ASTON MARTIN">ASTON MARTIN</option>
                        <option value="AUDI">AUDI</option>
                        <option value="BENTLEY">BENTLEY</option>
                        <option value="BMW">BMW</option>
                        <option value="BUICK">BUICK</option>
                        <option value="CADILLAC">CADILLAC</option>
                        <option value="CHEVROLET">CHEVROLET</option>
                        <option value="CHRYSLER">CHRYSLER</option>
                        <option value="DODGE">DODGE</option>
                        <option value="FERRARI">FERRARI</option>
                        <option value="FORD">FORD</option>
                        <option value="GMC">GMC</option>
                        <option value="HONDA">HONDA</option>
                        <option value="HUMMER">HUMMER</option>
                        <option value="HYUNDAI">HYUNDAI</option>
                        <option value="INFINITI">INFINITI</option>
                        <option value="ISUZU">ISUZU</option>
                        <option value="JAGUAR">JAGUAR</option>
                        <option value="JEEP">JEEP</option>
                        <option value="KIA">KIA</option>
                        <option value="LAMBORGHINI">LAMBORGHINI</option>
                        <option value="LAND ROVER">LAND ROVER</option>
                        <option value="LEXUS">LEXUS</option>
                        <option value="LINCOLN">LINCOLN</option>
                        <option value="LOTUS">LOTUS</option>
                        <option value="MASERATI">MASERATI</option>
                        <option value="MAYBACH">MAYBACH</option>
                        <option value="MAZDA">MAZDA</option>
                        <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
                        <option value="MERCURY">MERCURY</option>
                        <option value="MINI">MINI</option>
                        <option value="MITSUBISHI">MITSUBISHI</option>
                        <option value="NISSAN">NISSAN</option>
                        <option value="PONTIAC">PONTIAC</option>
                        <option value="PORSCHE">PORSCHE</option>
                        <option value="ROLLS-ROYCE">ROLLS-ROYCE</option>
                        <option value="SAAB">SAAB</option>
                        <option value="SATURN">SATURN</option>
                        <option value="SUBARU">SUBARU</option>
                        <option value="SUZUKI">SUZUKI</option>
                        <option value="TOYOTA">TOYOTA</option>
                        <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                        <option value="VOLVO">VOLVO</option>
                    </select>
                </div>
                <div>
                    <h4>Année de mise en circulation <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3">
                        <option value="">Année de mise en circulation</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                    </select>
                </div>
                <div>
                    <h4>Nombre de places <span class="asterisk">*</span></h4>
                    <select class="form-select form-select-lg mb-3" >
                        <option value="">Nombres de places </option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="adCar_kilometrage_radio fs-5">
                    <h4>Choisissez votre type de kilométrage <span class="asterisk">*</span></h4>

                    <div class="">
                    <input type="radio" id="illimite" name="kilometrageRadio" class="form-check-input" />
                    <label for="illimite">Illimité</label>
                    </div>
            
                    <div>
                    <input type="radio" id="limite" name="kilometrageRadio" class="form-check-input" />
                    <label for="limite">Limité</label>
                    </div>
                </div>

                <div class="adCar_kilometrage_select hidden mt-2">
                    <!-- <label for="kilometrageSelect">:</label> -->
                    <select class="form-select form-select-lg mb-3" name="kilometrageSelect" id="kilometrageSelect">
                    <option value="">Choisissez une limite de kilométrage <span class="asterisk">*</span></option>
                    <option value="250">250 km</option>
                    <option value="500">500 km</option>
                    <option value="750">750 km</option>
                    <option value="1000">1000 km</option>
                    <option value="1250">1250 km</option>
                    <option value="1500">1500 km</option>
                    <option value="1750">1750 km</option>
                    <option value="2000">2000 km</option>
                    <option value="2250">2250 km</option>
                    <option value="2500">2500 km</option>
                    </select>
                </div>
            </div>
        </section>
        <section class="addCar_section my-4 mx-auto fs-5">
            <div class="border">
                <div>
                    <h4 for="">Adresse de départ et de retour </span></h4>
                        <ul>
                            <li class="d-flex justify-content-between m-3">
                                <label for="">Pays <span class="asterisk">*</span></label>
                                <input type="text" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="">Région <span class="asterisk">*</span></label>
                                <input type="text" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="">Code Postal</label>
                                <input type="number" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="">Ville <span class="asterisk">*</span></label>
                                <input type="text" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="">Adresse</label>
                                <input type="text" class="form-control w-50 fs-5">
                            </li>
                            <li class="d-flex justify-content-between m-3">
                                <label for="">Quartier <span class="asterisk">*</span></label>
                                <input type="text" class="form-control w-50 fs-5">
                                
                            </li>
                            <li class="d-flex justify-content-between mx-3 fs-5">
                                <label for="">Complément d'adresse <br>(étage, n° d'appartements...)</label>
                                <input type="text" class="form-control w-50 fs-5">
                            </li>
                        </ul>
                </div>
                <div>
                <h4>Options du véhicule </span></h4>             
                
                <!-- Option Bluetooth -->
                <ul>
                    <li>
                        <input type="checkbox" value="Bluetooth" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Bluetooth</label>
                    </li>
                <!-- Option Climatisation -->
                    <li>
                        <input type="checkbox" value="Climatisation"class="options form-check-input me-2" onchange="showRecap()"> 
                        <label for="">Climatisation</label>
                    </li>
                <!-- Option GPS -->
                    <li>
                        <input type="checkbox" value="GPS" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">GPS</label>
                    </li>
                <!-- Option Carplay, Android Auto -->
                    <li>
                        <input type="checkbox" value="Carplay" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Carplay</label>
                    </li>
                <!-- Option Attache ISOFIX -->
                    <li>
                        <input type="checkbox" value="Attache ISOFIX" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Attache ISOFIX</label>
                    </li>
                <!-- Option Caméra de recul -->
                    <li>
                        <input type="checkbox" value="Caméra de recul" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Caméra de recul</label>
                    </li>
                <!-- Option Siège pour enfant -->    
                    <li>
                        <input type="checkbox" value="Siège pour enfant" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Siège pour enfant</label>
                    </li>
                    <!-- Option Toit ouvrant -->    
                    <li>
                        <input type="checkbox" value="Toit ouvrant" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Toit ouvrant</label>
                    </li>
                    <!-- Option Port USB -->    
                    <li>
                        <input type="checkbox" value="Port USB" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Port USB</label>
                    </li>
                    <!-- Option Porte-vélos -->    
                    <li>
                        <input type="checkbox" value="Porte-vélos" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Porte-vélos</label>
                    </li>
                    <!-- Option Décapotable -->    
                    <li>
                        <input type="checkbox" value="Décapotable" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Décapotable</label>
                    </li>
                    <!-- Option Android Auto -->    
                    <li>
                        <input type="checkbox" value="Android Auto" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Android Auto</label>
                    </li>
                    <!-- Option Entrée auxiliaire -->    
                    <li>
                        <input type="checkbox" value="Entrée auxiliaire" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Entrée auxiliaire</label>
                    </li>
                    <!-- Option Surveillance des angles morts -->    
                    <li>
                        <input type="checkbox" value="Surveillance des angles morts" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Surveillance des angles morts</label>
                    </li>
                    <!-- Option Sièges chauffants -->    
                    <li>
                        <input type="checkbox" value="Sièges chauffants" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Sièges chauffants</label>
                    </li>
                    <!-- Option Chargeur USB -->    
                    <li>
                        <input type="checkbox" value="Chargeur USB" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Chargeur USB</label>
                    </li>
                    <!-- Option Carte de péage -->
                    <li>
                        <input type="checkbox" value="Carte de péage" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Carte de péage</label>
                    </li>
                     <!-- Option Traction intégrale -->
                     <li>
                        <input type="checkbox" value="Traction intégrale" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Traction intégrale</label>
                    </li>
                    <!-- Option Accessible en fauteuil roulant -->
                    <li>
                        <input type="checkbox" value="Accessible en fauteuil roulant" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Accessible en fauteuil roulant</label>
                    </li>
                    <!-- Option Accès sans clé -->
                    <li>
                        <input type="checkbox" value="Accès sans clé" class="options form-check-input me-2" onchange="showRecap()">
                        <label for="">Accès sans clé</label>
                    </li>
                </ul>
                    <p id="recap"></p>
                </div> 
            </div>
        </section>
        <section class="addCar_section my-4 mx-auto fs-5">
            <div class="border">
                
                <div>
                    <h4>Règlement du véhicule </span></h4>
                    <ul>
                        <li>
                            <input type="checkbox" value="Animaux acceptés" class="reglement form-check-input me-2" onchange="showRecap2()">
                            <label for="">Animaux acceptés</label>
                        </li>
                        <li>
                            <input type="checkbox" value="Règles sanitaires" class="reglement form-check-input me-2" onchange="showRecap2()">
                            <label for="">Prière de respecter les règles sanitaires</label>
                        </li>
                        <li>
                            <input type="checkbox" value="Etat de propreté et de fonctionnement" class="reglement form-check-input me-2" onchange="showRecap2()">
                            <label for="">Véhicule à rendre dans le même état de propreté et de fonctionnement.</label>
                        </li>
                        <li>
                            <input type="checkbox" value="Conduite responsable" class="reglement form-check-input me-2" onchange="showRecap2()">
                            <label for="">Conduite responsable</label>
                        </li>
                        <li>
                            <input type="checkbox" value="Permis Obligatoire" class="reglement form-check-input me-2" onchange="showRecap2()">
                            <label for="">Permis Obligatoire</label>
                        </li>
                    </ul>
                    <p id="recap_reglement"></p>
                </div>
                <div>
                    <h4>Déscription du véhicule</span></h4>
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div>
                    <h4>Informations supplémentaires </span></h4>
                    <textarea name="" id="" cols="30" rows="5" placeholder="Sièges supplémentaires..." class="form-control"></textarea>
                </div>

                <div class="casse-caution my-3">
                    <h4>Caution <span class="asterisk">*</span></h4>
                    <input type="number" placeholder="Caution en FCFA" class="form-control form-control-lg fs-5">
                </div>


                <div class="casse-ajouter-une-photo my-4 fs-4">
                <label for="formFileMultiple" class="form-label ">Ajoutez des images <span class="asterisk">*</span></label>
                <input class="form-control form-control-lg" type="file" id="formFileMultiple"  multiple>
                </div>
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

<!-- 
 <aside class="w-50  me-4">
<div class="row ">
    <div class="col-lg-7 ">
        <div class="row ">
            <div class="col-lg-12">
                <img src="img\grand.jpg" class="w-100" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img src="img\paysage.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-6">
                <img src="img\paysage.jpg" class="w-100" alt="">
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <img src="img/image longue.jpg" class="w-100" alt="">
    </div>
</div> 
    <div class="row">
            <div class="col-lg-11">
            <img src="img\grand.jpg" class="w-100" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
            <img src="img\carré voiture.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-5">
            <img src="img\carré voiture.jpg" class="w-100" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11">
            <img src="img\paysage.jpg" class="w-100" alt="">
            </div>
        </div>

        
    </div>
    <div class="row">
        <div class="col-lg-5">
            <img src="img/image longue.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="img\paysage.jpg" class="w-100" alt="">
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <img src="img\paysage.jpg" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
 

</div>
</div>
</aside>  -->

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