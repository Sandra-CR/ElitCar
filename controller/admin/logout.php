<?php

include_once "../../model/pdo.php";
$id= $_SESSION["id"];
$status = "Offline Now";
$sql2 = "UPDATE particular SET status=? WHERE id_user=?";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([ $status, $id]);
session_start();
session_destroy();
unset($_SESSION["name"]);
unset($_SESSION["id"]);
unset($_SESSION["role"]);
header("Location:../../view/home");
exit;