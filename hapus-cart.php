<?php
session_start();
include "koneksi.php";

$id = $_GET["id"];
    
    if(isset($_GET['id'])){
        unset($_SESSION["cart"][$id]);
        header("location:keranjang.php");
    }
    

    ?>