<!-- dashboard -->
<?php include_once "include/base.php";?>
<?php include_once "include/dashboard.php";?>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-2">
            <?php include_once "include/account_menu.php";?>
            </div>
            <!-- settings --> 
            <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
               <!-- Modifier le mail --> 
                <div class="mb-5">
                    <h5 class="mb-4" style="font-weight:700 !important">Modifier mon mail</h5>
                    <div class="mb-3">
                        <label for="new-email" class="form-label" style="font-weight:700;">Nouveau email</label>
                        <input type="email" class="form-control" id="new-email" placeholder="Votre nouveau email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight:700;">Votre mot de passe Elicitar</label>
                        <input type="password" class="form-control" id="password" placeholder="Votre mot de passe">
                        <div class="form-text"><a style="color:black !important;" href="#">Mot de passe oublié ?</a></div>
                    </div>
                    <button type="button" class="btn btn-warning col-md-3" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%">Changer mon email</button>
                </div>
                <!-- Modifier le mdp --> 
                <div class="mb-4">
                    <h5 class="mb-4" style="font-weight:700 !important">Modifier mon mot de passe</h5>
                    <div class="mb-3">
                        <label for="old-password" class="form-label" style="font-weight:700;">Ancien mot de passe</label>
                        <input type="password" class="form-control" id="old-password" placeholder="Votre ancien mot de passe">
                        <div class="form-text"><a href="#" style="color:black !important;">Mot de passe oublié ?</a></div>
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label" style="font-weight:700;">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new-password" placeholder="Votre nouveau mot de passe">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label" style="font-weight:700;">Confirmation</label>
                        <input type="password" class="form-control" id="confirm-password" placeholder="Confirmez votre mot de passe">
                    </div>
                    <button type="button" class="btn btn-warning" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%">Changer mon mot de passe</button>
                </div>
                <!-- Supprimer le compte--> 
                <div>
                    <a class="text text-danger" style="font-weight:700;" href="#">Supprimer mon compte </a>
                </div>                
            </div>
        </div>
    </div>
</body>
