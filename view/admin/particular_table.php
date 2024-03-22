<!-- dashboard -->
<?php
include_once "../../controller/admin/role.php"; 
include_once "../../model/pdo.php"; 
include_once "../include/base.php";
if(isset($_SESSION['role']) && $_SESSION['role'] == Role::ADMIN->value) {
  include_once "../include/admin/dashboard_admin.php";
  ?>

  <div class="container-switch mx-auto my-5">
    <div class="container-round rounded-pill col-2">
      <div class="container-href-2 rounded-pill col-6 "><a href="view/admin/agency_table.php">Les agences</a></div>
      <div class="container-href rounded-pill col-6"><a href="#">Les clients</a></div>
    </div>
  </div>

  <?php include_once "../message.php"; ?>

  <div class="container-table mx-auto mt-2 col-8">
    <div class="table-container">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Fiche client</th>
            <th>Modifier</th>
            <th>Bloquer</th>
            <th>Supprimée</th>
          </tr>
        </thead>
        <tbody>
          <!-- Insérer vos données ici -->
          <?php
          if (isset($_SESSION["id"])) {
              $id = $_SESSION['id'];
              $sql = "SELECT * FROM particular"; 
              $stmt = $pdo->query($sql); // Exécution de la requête SQL
              $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      $table = "";
                      $token = $_SESSION['token'];
                      $roleArray = ["Visiteur","Client", "Secrétaire", "Administrateur"];
                  foreach ($users as $user ) {
                      $table .="<tr>";
                      $table .="<td>" . htmlentities($user['id_user']) . "</td>"; 
                      $table .="<td>" . htmlentities($user['first_name']) . "</td>"; 
                      $table .="<td>" . htmlentities($user['last_name']) . "</td>";
                      $table .="<td>" . htmlentities($user['mail']) . "</td>"; 
                      $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Voir la fiche client' href='view/admin/read_admin_particular?id=$user[id_user]'>👁️</a> </td>"; 
                      $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='view/admin/update_admin_particular?id=$user[id_user]'>🧬</a> </td>"; 

                    if($user["blocked"] == 0){
                      $targetValue = "#validation_blocked";
                    }else{
                      $targetValue = "#validation_deblocked";
                    }
                      $table .="<td> <a class='none bomb2' data-bs-toggle='modal' data-bs-target='$targetValue' data-link='controller//admin/blocked_ctrl_particular.php?id=$user[id_user]' href='' data-toggle='tooltip' data-placement='top' title='Bloquer/Débloquer un utilisateur' >🔒</a> </td>"; 

                      $table .="<td> <a class='none bomb' data-bs-toggle='modal' data-bs-target='#validation_delete' data-link='controller//admin/delete_ctrl_particular.php?id=$user[id_user]' data-placement='top' href='' title='Supprimer un utilisateur'>❌</a> </td>"; 
                      $table .="<tr>";
                  }
                  echo $table;
              }
              ?>
              
          <!-- Ajouter plus de lignes si nécessaire -->
        </tbody>
      </table>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="validation_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Voulez vous vraiment supprimée cet(te) utilisateur ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <a class="btn btn-danger" id="delete" >SUPPRIMER</a></button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="validation_blocked" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Bloquage de l'utilisateur</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Voulez vous vraiment bloquer cet(te) utilisateur ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <a class="btn btn-danger" id="blocked" >BLOQUER</a></button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="validation_deblocked" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Débloquage de l'utilisateur</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Voulez vous vraiment débloquer cet(te) utilisateur ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <a class="btn btn-danger" id="deblocked" >DEBLOQUER</a></button>
        </div>
      </div>
    </div>
  </div>
<?php }else{ 
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>