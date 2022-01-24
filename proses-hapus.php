<?php
    include 'koneksi.php';
    if (isset($_GET['idk'])) {
        
            echo '<script> window.location="daftarbarang.php" </script>';
    }else if(isset($_GET['idp'])){
        echo '<script> window.location="daftarpengguna.php" </script>';
    }else if(isset($_GET['idd'])){
        echo '<script> window.location="detail-pembelian.php" </script>';
    }
    
    if (isset($_GET['idk'])) {
        $produk = mysqli_query($koneksi,"SELECT product_image FROM tb_product WHERE category_id = '".$_GET['idk']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./product-men/'.$p->product_image);
        
        $delete = mysqli_query($koneksi,"DELETE FROM tb_product WHERE category_id = '".$_GET['idk']."' ");
        echo '<script> window.location="daftarbarang.php" </script>';
    }else if(isset($_GET['idp'])){
        $delete_user = mysqli_query($koneksi,"DELETE FROM register WHERE register_id = '".$_GET['idp']."' ");
    }else if(isset($_GET['idd'])){
        $delete_user = mysqli_query($koneksi,"DELETE FROM pembelian WHERE id_pelanggan = '".$_GET['idd']."' ");
    }



?>