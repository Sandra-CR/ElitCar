<!-- dashboard -->
<?php
 include_once "../../controller/admin/role.php";
 include_once "../../model/pdo.php"; 
 include_once "../include/base.php";
 if (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value){
 include_once "../include/professional/dashboard_professional.php";
 include_once "../message.php"; ?>

<style>
    .row>*{
    width: 42% !important;
}
@media screen and (max-width: 1289px) {
    .row>*{
        width: 50% !important;
    }
}
@media screen and (max-width: 950px){
    .row>*{
        width: 100% !important;
    }
}
</style>
<div class="container overflow-hidden mt-5 text-left p-3">

    <div class="row gy-5">

        <?php
                if (isset($_SESSION["id"])) {
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM car WHERE id_owner = '$id'"; 
                    $stmt = $pdo->query($sql); // Exécution de la requête SQL
                    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $table = "";
                    foreach ($cars as $car ) {
                        $id_car = $car['id_car'];
                        $sql2 = "SELECT * FROM address_car WHERE id_car = '$id_car'"; 
                        $stmt2 = $pdo->query($sql2); // Exécution de la requête SQL
                        $carAddress = $stmt2->fetch(PDO::FETCH_ASSOC);
                        $sql3 = "SELECT * FROM car_picture WHERE car_id = '$id_car'"; 
                        $stmt3 = $pdo->query($sql3); // Exécution de la requête SQL
                        if ($stmt3) {
                            $carPicture = $stmt3->fetch(PDO::FETCH_ASSOC);
                            if (is_array($carAddress)) {
                                $table .="<div class='modify'>";
                                $table .="<a class='none' href=''>";
                                $table .="<div class='card mb-3 p-0 mx-auto' style='max-width: 540px;'>";
                                $table .=     "<div class='row g-0 '>"; 
                                $table .=         "<div class='col-md-4'>"; 
                                $table .=             "<img src='img/upload/car". htmlspecialchars($carPicture['path']) ."' class='img-fluid rounded-start h-100 col-12' alt='...' style='object-fit: cover;'>";
                                $table .=         "</div>"; 
                                $table .=         "<div class='col-md-8'>"; 
                                $table .=             "<div class='card-body'>"; 
                                $table .=                 "<h5 class='card-title'>" . htmlspecialchars($car['model']) ."</h5>"; 
                                $table .=                 "<p class='card-text-1'><img src='img/star1.jpg' class='mx-1' alt=''>Aucune évalution</p>";
                                $table .=                 "<p class='card-text-1'><img src='img/location-pin 1.jpg' class='mx-1' alt=''>" . htmlspecialchars( $carAddress['city']) . "</p>";
                                $table .=                 "<p class='card-text'><large class='text-body-black'>" . htmlspecialchars($car['bail']) . " CFA</large></p>";
                                $table .=             "</div>";
                                $table .=         "</div>";
                                $table .=     "</div>";
                                $table .="</div>";
                                $table .="<a class='none success' href='view/professional/update_advertisement.php?id=$car[id_car]'>Modifier l'annonce</a> | ";
                                $table .="<a class='none bomb failed' data-bs-toggle='modal' data-bs-target='#validation_delete' data-link='controller//admin/delete_ctrl_advertisement.php?id=$car[id_car]' data-placement='top' title='Supprimer l'annonce'>Supprimer l'annonce</a>";
                                $table .="</a>";
                                $table .="</div>";
                            }
                        }
                    }
                    echo $table;
                }
        ?>

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
          Voulez vous vraiment supprimée cette annonce ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <a class="btn btn-danger" id="delete" >SUPPRIMER</a></button>
        </div>
      </div>
    </div>
<?php
 }else{ 
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} 
?>

<!-- <div class="modify">
        <a class='none' href="#">
        <div class="card mb-3 p-0 mx-auto" style="max-width: 540px;">
            <div class="row g-0 ">
                <div class="col-md-4">
                    <img src="img/voiture2.png" class="img-fluid rounded-start h-100 col-12" alt="..." style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><img src="img/location-pin 1.jpg" alt="">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div> 
            <a class="none success" href="">Modifier l'annonce</a> |
            <a class="none failed" href="">Supprimer l'annonce</a>
        </a>
    </div>
    <div class="modify">
        <div class="card mb-3 p-0 mx-auto" style="max-width: 540px;">
            <div class="row g-0 ">
                <div class="col-md-4">
                    <img src="img/voiture2.png" class="img-fluid rounded-start h-100 col-12" alt="..." style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><img src="img/location-pin 1.jpg" alt="">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div> 
            <a href="">Modifier l'annonce</a>
            <a href="">Supprimer l'annonce</a>
    </div>

    <div class="modify">
        <div class="card mb-3 p-0 mx-auto" style="max-width: 540px;">
            <div class="row g-0 ">
                <div class="col-md-4">
                    <img src="img/voiture2.png" class="img-fluid rounded-start h-100 col-12" alt="..." style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><img src="img/location-pin 1.jpg" alt="">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div> 
            <a href="">Modifier l'annonce</a>
            <a href="">Supprimer l'annonce</a>
    </div>

    <div class="modify">
        <div class="card mb-3 p-0 mx-auto" style="max-width: 540px;">
            <div class="row g-0 ">
                <div class="col-md-4">
                    <img src="img/voiture2.png" class="img-fluid rounded-start h-100 col-12" alt="..." style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><img src="img/location-pin 1.jpg" alt="">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div> 
            <a href="">Modifier l'annonce</a>
            <a href="">Supprimer l'annonce</a>
    </div>



    </div>
</div> -->
