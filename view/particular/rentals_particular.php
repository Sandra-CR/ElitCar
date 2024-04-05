<!-- dashboard -->

<?php
 include_once "../../controller/admin/role.php";
 include_once "../include/base.php";
 include_once "../../model/pdo.php";
 if(isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
 include_once "../include/particular/dashboard_particular.php";
 }
?>
<?php 
if(isset($_SESSION['name'])) {
    include_once "../messagerie/users.php"; // Inclure le fichier si un compte est connecté
}
?>