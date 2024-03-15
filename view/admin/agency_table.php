<!-- dashboard -->
<?php
 include_once "../../controller/admin/role.php"; 
 include_once "../../model/pdo.php"; 
 include_once "../include/base.php";
 include_once "../include/admin/dashboard_admin.php";?>

<div class="container-switch mx-auto my-5">
    <div class="container-round rounded-pill col-2">
        <div class="container-href rounded-pill col-6 "><a href="#">Les agences</a></div>
        <div class="container-href-2 rounded-pill col-6"><a href="view/admin/particular_table.php">Les clients</a></div>
    </div>
</div>

<div class="container-table mx-auto col-8">
  <div class="table-container">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Abonnement</th>
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
          $sql = "SELECT * FROM professional"; 
          $stmt = $pdo->query($sql); // Exécution de la requête SQL
          $pros = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $table = "";
          $token = $_SESSION['token'];
          foreach ($pros as $pro ) {
            $id = $pro["id_pro"];
            $sql2 = "SELECT * FROM subscription WHERE id_pro = '$id' "; 
            $stmt2 = $pdo->query($sql2); // Exécution de la requête SQL
            $pro2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $table .="<tr>";
            $table .="<td>" . htmlentities($pro['id_pro']) . "</td>"; 
            $table .="<td>" . htmlentities($pro['name']) . "</td>"; 
            $table .="<td>" . htmlentities($pro['mail']) . "</td>"; 
            if (isset($pro2['plan_name'])) {
              $table .="<td>" . htmlentities($pro2['plan_name']) . "</td>"; 
            }else {
              $table .="<td>Aucun abonnement</td>"; 
            }
            //($current_file == 'messages.php') ? 'active-link' : ''; 
            $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Voir la fiche client' href='view/admin/read_admin_agency?id=$pro[id_pro]'>👁️</a> </td>"; 
            $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='view/users/update_user.php?id=$pro[id_pro]'>🧬</a> </td>"; 
            $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Bloquer le compte' href='view/users/update_mdp.php?id=$pro[id_pro]'>🔒</a> </td>"; 
            $table .="<td> <a class='none bomb' data-bs-toggle='modal' data-bs-target='#validation_delete' data-link='controller//admin/delete_ctrl_agency.php?id=$pro[id_pro]' data-placement='top' href='' title='Supprimer un utilisateur'>❌</a> </td>"; 
            $table .="<tr>";
          }
          echo $table;
        }
        ?>
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