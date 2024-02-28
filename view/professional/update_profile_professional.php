<!-- dashboard -->
<?php 
 include_once "../../controller/admin/role.php";
 include_once "../include/base.php";
 include_once "../include/professional/dashboard_professional.php";?>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-2">
            <?php include_once "../include/professional/account_menu_professional.php";?>
            </div>
            <!-- Modification du compte --> 
            <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
            <!-- le logo-->
            <div class="col-md-2">
                <div class="mb-3 mt-3 d-flex flex-column align-items-center text-center">
                    <h5 class="mb-4" style="font-weight:700 !important">Votre logo</h5>
                    <div class="border rounded d-flex justify-content-center align-items-center" style="width: 120px; height: 100px; background-color:#D9D9D9;">
                        <!-- Utilisation de Font Awesome pour l'icône "appload" -->
                        <i class="fas fa-cloud-upload-alt" style="font-size: 50px;"></i>
                    </div>
                    <a href="#" style="color:black;">Modifier</a>
                </div>
            </div>
                <!-- les informations personnelles -->
                <div class="col-md-8">
                    <h5 class="mb-4 mt-5" style="font-weight:700 !important">Informations sur l'agence</h5>
                    <form>
                        <div class="mb-3">
                            <label for="nom" class="form-label" style="font-weight:700;">Nom de l'agence</label>
                            <input type="text" class="form-control" id="nom" placeholder="Votre nom">
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-warning mt-4" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%">Sauvegarder les modifications</button>
            </div>
        </div>
    </div>
</body>
