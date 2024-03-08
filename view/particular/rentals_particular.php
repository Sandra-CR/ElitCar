<!-- dashboard -->

<?php
 include_once "../../controller/admin/role.php";
 include_once "../include/base.php";
 if(isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
 include_once "../include/particular/dashboard_particular.php";
 }
?>