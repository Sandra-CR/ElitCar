<?php 

if (isset($_GET["status"]) && isset($_GET["message"])){
    $status = $_GET["status"];
    $message = $_GET["message"];

    echo "<h3 class='$status animation1 text-center'>$message</h3>";
}