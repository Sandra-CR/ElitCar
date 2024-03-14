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
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM professional"; 
            $stmt = $pdo->query($sql); // Exécution de la requête SQL
            $pros = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $table = "";
                    $token = $_SESSION['token'];
                    $roleArray = ["Visiteur","Client", "Secrétaire", "Administrateur"];
                foreach ($pros as $pro ) {
                    $table .="<tr>";
                    $table .="<td>" . htmlentities($pro['id_pro']) . "</td>"; 
                    $table .="<td>" . htmlentities($pro['name']) . "</td>"; 
                    $table .="<td>" . htmlentities($pro['mail']) . "</td>"; 
                    //$table .="<td>" . htmlentities($pro['abonement']) . "</td>"; 
                    $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='VieW' href='view/users/read_user.php?id=$pro[id_pro]'>👁️</a> </td>"; 
                    $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='view/users/update_user.php?id=$pro[id_pro]'>🧬</a> </td>"; 
                    $table .="<td> <a class='none bomb' data-bs-toggle='modal' data-bs-target='#validation_delete' data-link='controller/delete_ctrl_user.php?id=$pro[id_pro]&token=$token' data-placement='top' href='' title='Supprimer un utilisateur'>🔒</a> </td>"; 
                    $table .="<td> <a class='none' data-toggle='tooltip' data-placement='top' title='Modifier un mots de passe' href='view/users/update_mdp.php?id=$pro[id_pro]'>a</a> </td>"; 
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