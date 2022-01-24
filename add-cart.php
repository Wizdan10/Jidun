<?php
session_start();
    include "koneksi.php";

    $id = $_GET["id"];
   
    $sql = "SELECT * FROM tb_product WHERE category_id =".$id;
    $query = mysqli_query($koneksi,$sql);
    $hasil= mysqli_fetch_object($query);
    

    $_SESSION["cart"][$id]=[
        "nama"=>$hasil->product_name,
        "harga"=>$hasil->product_price,
        "gambar"=>$hasil->product_image,
        "jumlah" => 1,
        "berat" => 1
    ];
        header("location:keranjang.php");
    ?>