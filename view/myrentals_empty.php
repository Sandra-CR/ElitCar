<?php 
include_once "../controller/admin/role.php";
include_once "include/base.php";
?>
<style>
    .myrentalsEmpty_section{
        height: 65vh;
    }
</style>
<div>
<section class="myrentalsEmpty_section d-flex justify-content-center my-auto">
    <div class="border w-25 my-auto ">
        <div class="w-25 mx-auto"><img class="w-100" src="img\logo_voiture_empty.png" alt=""></div>
        <div class="mx-auto  text-center w-100"><p>Aucune location prévue à l'avenir.</p></div>
        <div class="w-100 text-center" ><p>Actuellement, vous ne disposez d'aucune location programmée. Envisagez d'en organiser une !</p></div>
        <div class=" w-100 d-flex justify-content-center "><button type="button" class="btn btn-warning text-light w-auto ">Trouver un véhicule</button></div>
    </div>
</section>
</div>
<?php 
include_once "footer.php"; 
?>


