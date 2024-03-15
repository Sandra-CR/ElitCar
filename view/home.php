
<?php 
include_once "../model/pdo.php";
include_once "../controller/admin/tools.php";


if (isset($_GET['code'])) {
  // Récupérer le code d'autorisation
  $auth_code = $_GET['code'];
  
  // Définir les informations d'authentification pour la requête d'échange de code
  $client_id = '940497895444-tb4oe307ftrctvr8vl4mrnkvgtegpa35.apps.googleusercontent.com';
  $client_secret = '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';
  $redirect_uri = 'http://localhost/ElitCar/view/home';
  
  // Construire les données de requête pour l'échange de code
  $post_data = array(
    'code' => $auth_code,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'grant_type' => 'authorization_code'
  );
  
  // Effectuer la requête POST pour échanger le code contre un jeton d'accès
  $ch = curl_init('https://accounts.google.com/o/oauth2/token');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  $response = curl_exec($ch);
  if ($response === false) {
    echo "Erreur cURL: " . curl_error($ch);
  }
  curl_close($ch);
  
  // Vérifier si la réponse est valide
  if ($response) {
    // Convertir la réponse JSON en tableau associatif
    $auth_info = json_decode($response, true);
    if ($auth_info === null) {
      echo "Erreur de décodage JSON: " . json_last_error_msg();
    }
    
    // Récupérer le jeton d'accès
    $access_token = $auth_info['access_token'];
    
    // Utiliser le jeton d'accès pour accéder aux informations de l'utilisateur via Google People API
    $ch2 = curl_init('https://people.googleapis.com/v1/people/me?personFields=names,emailAddresses');
    curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    $user_info = curl_exec($ch2);
    if ($user_info === false) {
      echo "Erreur cURL: " . curl_error($ch2);
    }
    curl_close($ch2);
    
    // Vérifie si la réponse est valide
    if ($user_info) {
      // Convertir la réponse JSON en tableau associatif
      $user_data = json_decode($user_info, true);
      var_dump($user_data);
      if ($user_data === null) {
        echo "Erreur de décodage JSON: " . json_last_error_msg();
      }
      
      // Afficher les informations de l'utilisateur
      
      if (isset($user_data['emailAddresses'][0]['value'])) {
        $email = $user_data['emailAddresses'][0]['value'];
      } else {
        echo "Pas d'email";
      }
      
      if (isset($user_data['names'][0]['givenName']) && !empty($user_data['names'][0]['givenName'])) {
        $given_name = $user_data['names'][0]['givenName'];
      } else {
        echo "Pas de givenName";
      }
      
      if (isset($user_data['names'][0]['familyName']) && !empty($user_data['names'][0]['familyName'])) {
        $family_name = $user_data['names'][0]['familyName'];
      } else {
          $family_name = "null";
      }
      
      $birthdate = "1900-01-01";
      $pp = "img/no_picture_update.svg"; // Image de profil par défaut
      $psw = bin2hex(random_bytes(16));
      $pol = 1;
      $new = 0;
      $role = "1"; // Définition du rôle de l'utilisateur
      
      try {
        // Vérifiez si l'utilisateur existe déjà dans la base de données
        $sql_google = "SELECT * FROM particular WHERE mail = '$email' ";
        $stmt_google = $pdo->query($sql_google);
        $existing_user = $stmt_google->fetch(PDO::FETCH_ASSOC);
        
        // Si l'utilisateur existe déjà, ne l'insérez pas à nouveau
        if ($existing_user) {
          session_start();
          $_SESSION["id"] = $existing_user['id_user']; 
          $_SESSION["name"] = $existing_user['first_name']; // Attribution du nom complet de l'utilisateur à la session
          $_SESSION["role"] = $existing_user['role']; // Attribution du rôle de l'utilisateur à la session
          $_SESSION["token"] = bin2hex(random_bytes(16)); // Génération d'un jeton de sécurité et attribution à la session
          sendMessage("Bon retour Parmi nous", "success", "home.php");
        } else {
          // Insérez l'utilisateur dans la base de données
          $sql = "INSERT INTO particular (first_name, last_name, mail, psw, birthdate, profile_picture, isEntreprise, role, newsletters, politique ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$given_name, $family_name, $email, $psw,  $birthdate, $pp, 0, $role, $new, $pol]);
          
          // Vérifiez si l'utilisateur a été inséré avec succès
          if ($stmt->rowCount() > 0) {
            // Vérifiez si l'utilisateur existe déjà dans la base de données
            $sql_google_2 = "SELECT * FROM particular WHERE mail = '$email' ";
            $stmt_google_2 = $pdo->query($sql_google_2);
            $existing_user_2 = $stmt_google_2->fetch(PDO::FETCH_ASSOC);
            
            // Si l'utilisateur existe déjà, ne l'insérez pas à nouveau
            if ($existing_user_2) {
              session_start();
              $_SESSION["id"] = $existing_user_2['id_user']; 
              $_SESSION["name"] = $existing_user_2['first_name']; // Attribution du nom complet de l'utilisateur à la session
              $_SESSION["role"] = $existing_user_2['role']; // Attribution du rôle de l'utilisateur à la session
              $_SESSION["token"] = bin2hex(random_bytes(16)); // Génération d'un jeton de sécurité et attribution à la session
              sendMessage("Compte crée", "success", "home.php");
            } else {
              sendMessage("Échec de l'insertion de l'utilisateur", "failed", "home.php");
            }
          } else {
            sendMessage("Échec de l'insertion de l'utilisateur", "failed", "home.php");
          }
        }
      } catch (PDOException $e) {
        // Gérez l'exception
        sendMessage("Une erreur s'est produite : " . $e->getMessage(), "failed", "home.php");
      }
    }
  }
}
include_once "../controller/admin/role.php";
include_once "include/base.php";
include_once "message.php";
?>

<!-- Section de filtre -->
<div class="container home-container mt-5 home-mt-5">
  <div class="row home-row">
    <div class="col-md-6 home-col-md-6">
      <div class="search-area home-search-area p-4 home-p-4">
        <h2 class="search-title home-search-title">Louez votre voiture en <br>afrique.<br><span class="sub-search-title home-sub-search-title">Où allez-vous ?</span></h2>
        <form class="form home-form">
          <div class="form-group home-form-group">
                            <div class="input-group home-input-group">
                              <div class="input-group-prepend home-input-group-prepend">
                                <span class="input-group-text home-input-group-text"><i class="fas fa-car  fa-2x"></i></span>
                              </div>

                            </div>
                        </div>
                        <div class="form-group home-form-group d-flex home-d-flex">
                          <div class="input-group home-input-group custom-margin home-custom-margin">
                            <div class="input-group-prepend home-input-group-prepend">
                              <span class="input-group-text home-input-group-text"><i class="fas fa-calendar-alt  fa-2x"></i></span>
                            </div>



                            <input type="text" class="form-control home-form-control" placeholder="Début">
                          </div>



                          <div class="input-group home-input-group">
                            <div class="input-group-prepend home-input-group-prepend">
                              <span class="input-group-text home-input-group-text"><i class="fas fa-calendar-alt  fa-2x"></i></span>
                            </div>



                            <input type="text" class="form-control home-form-control" placeholder="Fin">



                          </div>
                        </div>
                        <button type="submit" style="background-color:#FFAA00 !important; color:#ffffff" class="btn btn-warning home-btn-warning w-100">Recherche</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 home-col-md-6 img-col home-img-col">
              <img src="img/phone.png" class="image-fluid home-image-fluid" alt="">
            </div>
      </div>
</div>


<!-- Section offres-->
<div class="grey-decoration home-grey-decoration"></div>
<div class="grey-background home-grey-background">
  <div class="container home-containerfiltre my-4 home-my-4">
    <!-- Section principale -->
    <div class="column home-column ">
      <div class="col-md-12 home-col-md-12">
        <h2>Découvrez la toute nouvelle <br>approche pour la location de voitures.</h2>
        <p>Sélectionnez parmi une variété de véhicules proposés par des <br>professionnels à proximité de votre emplacement.</p>
      </div>
    </div>
     <!-- Colonne pour l'image -->
     <div class="col-lg-7 home-col-lg-7 intro-img home-intro-img">
        <img src="img/intro.png" class="img-fluid home-img-fluid" alt="" style="transform: translateY(-50%);">
     </div>
    <!-- Cartes -->
    <div class="cards home-cards row home-row justify-content-center home-justify-content-center">
      <div class="col-md-6 home-col-md-6">
        <div class="card home-card" style="height: 100%!important;">
          <div class="card-body home-card-body">
            <div class="icon-bg home-icon-bg mb-3 home-mb-3">
            <i class="fas fa-percent icon home-icon"></i>
            </div>
            <h5 class="card-title home-card-title"> Les offres les plus avantageuses <br> sur les voitures.</h5>
            <p class="card-text home-card-text" style ="display: flex; align-items: flex-start;">Explorez les propositions de <br> locations des diverses agences <br> dans plusieurs endroits.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 home-col-md-6">
        <div class="card home-card" style="height: 100%!important;">
          <div class="card-body home-card-body">
            <div class="icon-bg home-icon-bg mb-3 home-mb-3">
              <i class="fas fa-calendar-check icon home-icon"></i>
            </div>
            <h5 class="card-title home-card-title">Flexibilité tarifaire et possibilité <br> de réservation adaptable.</h5>
            <p class="card-text home-card-text" style ="display: flex; align-items: flex-start;">Évitez les surprises avec un prix <br> clair dès le départ et une annulation <br>gratuite et nettoyage amélioré.</p>
          </div>
        </div>
      </div>
   </div>
  </div>
</div>


<!-- Section vehicules -->
<div class="container home-container mt-5 home-mt-5">
    <h2 class="mb-4 home-mb-4">Trouvez des véhicules qui répondent <br> à vos exigences</h2>
    <div class="row home-row row-cols-1 home-row-cols-1 row-cols-md-4 home-row-cols-md-4 g-4 home-g-4">
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/citadine.png" class="card-img-top home-card-img-top" alt="Citadine">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">Citadine</h5>
                    </div>
                </div>
          </div>
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/monospace.png" class="card-img-top home-card-img-top" alt="Monospace">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">Monospace</h5>
                    </div>
                </div>
          </div>
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/utilitaire.png" class="card-img-top home-card-img-top" alt="Utilitaire">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">Utilitaire</h5>
                    </div>
                </div>
          </div>
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/suv.png" class="card-img-top home-card-img-top" alt="SUV">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">SUV</h5>
                    </div>
                </div>
          </div>
    </div>        
</div>


<!-- Section villes -->
<div class="container home-container my-5 home-my-5">
  <h2 class="text-city home-text-city mb-4 home-mb-4">Disponible dans 6 villes au Cameroun</h2>
  <div class="row home-row">
    <!-- Première ligne d'accordéons -->
    <div class="col-lg-4 home-col-lg-4">
      <div class="accordion home-accordion" id="home-accordionExample1">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne1">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne1" aria-expanded="true" aria-controls="home-collapseOne1">
              Location de voitures à Douala
            </button>
          </h2>
          <div id="home-collapseOne1" class="accordion-collapse collapse home-accordion-collapse" aria-labelledby="home-headingOne1" data-bs-parent="#home-accordionExample1">
            <div class="accordion-body home-accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Deuxième accordéon -->
    <div class="col-lg-4 home-col-lg-4">
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne2" aria-expanded="false" aria-controls="home-collapseOne2">
              Location de voitures à Yaoundé
            </button>
          </h2>
          <div id="home-collapseOne2" class="accordion-collapse collapse home-accordion-collapse" aria-labelledby="home-headingOne2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Troisième accordéon -->
    <div class="col-lg-4 home-col-lg-4">
      <div class="accordion home-accordion" id="home-accordionExample3">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne3">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne3" aria-expanded="false" aria-controls="home-collapseOne3">
              Location de voitures à Garoua
            </button>
          </h2>
          <div id="home-collapseOne3" class="accordion-collapse collapse home-accordion-collapse" aria-labelledby="home-headingOne3" data-bs-parent="#home-accordionExample3">
            <div class="accordion-body home-accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section conseils -->
<div class="container home-container my-5 home-my-5">
    <h2 class="section-title home-section-title">Conseils pour la location</h2>
    <p class="cont home-cont">Optez pour la location de voiture en toute assurance et vivez une aventure mémorable lors de votre road trip grâce à nos recommandations.</p>
    <div class="row home-row row-cols-1 home-row-cols-1 row-cols-md-3 home-row-cols-md-3 g-4 home-g-4">
        <div class="col home-col">
            <div class="card2 home-card2 h-100 home-h-100">
                <img src="img/forest.png" class="card-img-top2 home-card-img-top2" alt="Forêt">
                <div class="card-body2 home-card-body2">
                    <h5 class="section-subtitle home-section-subtitle">Où se loger à Yaoundé ?</h5>
                    <p class="section-content home-section-content">Pour les vacances, le travail, et de nombreuses autres circonstances.</p>
                </div>
            </div>
        </div>
        <div class="col home-col">
            <div class="card2 home-card2 h-100 home-h-100">
                <img src="img/desert.png" class="card-img-top2 home-card-img-top2" alt="Désert">
                <div class="card-body2 home-card-body2">
                    <h5 class="section-subtitle home-section-subtitle">Conseils pour un road trip réussi</h5>
                    <p class="section-content home-section-content">Pour la Saint-Valentin et bien d'autres occasions.</p>
                </div>
            </div>
        </div>
        <div class="col home-col">
            <div class="card2 home-card2 h-100 home-h-100">
                <img src="img/person.png" class="card-img-top2 home-card-img-top2" alt="Personne">
                <div class="card-body2 home-card-body2">
                    <h5 class="section-subtitle home-section-subtitle">Conseils pour un road trip réussi</h5>
                    <p class="section-content home-section-content">Pour la Saint-Valentin et bien d'autres occasions.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section FAQ -->
<div class="container home-container my-5 home-my-5">
  <h2 class="text-FAQ home-text-FAQ mb-4 home-mb-4">Foire aux questions</h2>
  <div class="row home-row">
    <!-- Première colonne d'accordéons -->
    <div class="col-md-6 home-col-md-6">
      <!-- Premier élément d'accordéon -->
      <div class="accordion home-accordion" id="home-accordionExample1">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne1">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne1" aria-expanded="true" aria-controls="home-collapseOne1">
            Lorem ipsum dolor sit amet?
            </button>
          </h2>
          <div id="home-collapseOne1" class="accordion-collapse collapse" aria-labelledby="home-headingOne1" data-bs-parent="#home-accordionExample1">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième élément d'accordéon -->
      <div class="accordion home-accordion" id="home-accordionExample3">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne3">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne3" aria-expanded="false" aria-controls="home-collapseOne3">
            Sed do eiusmod tempor incididunt ut labore?
            </button>
          </h2>
          <div id="home-collapseOne3" class="accordion-collapse collapse" aria-labelledby="home-headingOne3" data-bs-parent="#home-accordionExample3">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Seconde colonne d'accordéons -->
    <div class="col-md-6 home-col-md-6">
      <!-- Premier élément d'accordéon dans la seconde colonne -->
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo2" aria-expanded="false" aria-controls="home-collapseTwo2">
              Consectetur adipiscing elit?
            </button>
          </h2>
          <div id="home-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="home-headingTwo2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième élément d'accordéon dans la seconde colonne -->
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
              Ut enim ad minim veniam, quis nostrud exercitation?
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Section solutions -->
<div class="container home-container my-5 home-my-5">
  <div class="row home-row">
    <div class="col-lg-12 home-col-lg-12 mx-auto home-mx-auto">
      <div class="endcard home-endcard text-white mb-3 home-mb-3" style="border-radius: 5px;">
        <div class="row g-0 home-g-0">
          <div class="col-md-8 home-col-md-8">
            <div class="card-body home-card-body">
              <h3 class="card-title home-card-title" style="font-weight: 700; font-size: 36px;">Vous êtes une agence de location de <br> voitures ?</h3>
              <p class="card-text home-card-text" style="display: flex; align-items: flex-start; flex-direction: column;">Avec Africar, votre chiffre d'affaire augmente <br>de manière significative.</p>
              <a href="#" class="btn btn-warning home-btn-warning" style="width: 40%; height: 100%; padding: 15px; background-color:#FFAA00 !important; color:#ffffff;">Voir les solutions</a>
            </div>
          </div>
          <div class="col-md-4 home-col-md-4">
            <img src="img/drive.png" class="img-fluid3 home-img-fluid3" style="border-radius: 5px; height:100%" alt="Driving car">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "footer.php"; ?>

