<?php 
session_start();
include "koneksi.php";
$idt = $_GET["idt"];
$ids = $_GET["ids"];
$idw = $_GET["idw"];
$sql_1 = "SELECT * FROM tb_product WHERE category_id =".$idt.$ids.$idw;
    $query_1 = mysqli_query($koneksi,$sql_1);
    $hasil_1= mysqli_fetch_object($query_1);


    if($idt){
        $_SESSION["cart"][$idt]=[
            "nama"=>$hasil_1->product_name,
            "harga"=>$hasil_1->product_price,
            "gambar"=>$hasil_1->product_image,
            "jumlah" => 1,
            "berat" => 1
        ];
        header("location:Produk Men-1.php");
    }elseif($ids){
        $_SESSION["cart"][$ids]=[
            "nama"=>$hasil_1->product_name,
            "harga"=>$hasil_1->product_price,
            "gambar"=>$hasil_1->product_image,
            "jumlah" => 1,
            "berat" => 1
        ];
        header("location:Produk Sale.php");
    }elseif($idw){
        $_SESSION["cart"][$idw]=[
            "nama"=>$hasil_1->product_name,
            "harga"=>$hasil_1->product_price,
            "gambar"=>$hasil_1->product_image,
            "jumlah" => 1,
            "berat" => 1
        ];
        header("location:Produk Women.php");
    }
    
?>