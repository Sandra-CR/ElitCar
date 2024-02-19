<!-- dashboard -->
<?php include_once "include/base.php";?>
<?php include_once "include/dashboard.php";?>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-2">
            <?php include_once "include/account_menu.php";?>
            </div>
            <!-- Modification du compte --> 
            <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
                <!-- la photo -->
                <div class="col-md-2">
                    <div class="mb-3 mt-3">
                        <h5 class="mb-4" style="font-weight:700 !important">Votre photo</h5>
                        <div class="border rounded d-flex justify-content-center align-items-center" style="width: 120px; height: 100px; background-color:#D9D9D9;">
                            <i class="fa fa-user" aria-hidden="true" style="font-size: 50px;"></i>  
                        </div>
                        <a class="mb-4 " href="#"style="color:black;">Modifier votre photo</a>
                    </div>
                </div>
                <!-- les informations personnelles -->
                <div class="col-md-8">
                    <h5 class="mb-4 mt-5" style="font-weight:700 !important">Informations personnelles</h5>
                    <form>
                        <div class="mb-3">
                            <label for="nom" class="form-label" style="font-weight:700;">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label" style="font-weight:700;">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Votre prenom">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="dateNaissance" class="form-label" style="font-weight:700;">Date de naissance</label>
                                <input type="date" class="form-control" id="dateNaissance" name="dateNaissance">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="tel" class="form-label" style="font-weight:700;">Numéro de téléphone</label>
                                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Votre numéro de téléphone">
                            </div>
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-warning mt-4" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%">Sauvegarder les modifications</button>
            </div>
        </div>
    </div>
</body>
