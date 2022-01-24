<?php 
  session_start(); 
  include 'koneksi.php';
  if(!isset($_SESSION['login'])){
    header("location: login-user.php");
    exit;
  }
  ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/keranjang.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <title>Halaman Keranjang</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                <a class="navbar-brand me-5 text-success" href="#">CHILLDUST</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Produk Men-1.php" >Men</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Produk Women.php">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="Produk Sale.php" >Sale</a>
                    </li>
                    <li class="nav-item">
                        <i class="cart fas fa-shopping-cart ms-5"><a class="text-dark" href="keranjang.php" style="text-decoration: underline;">Cart</a></i>
                    </li>
                    <?php 
                    
                    $data = mysqli_query($koneksi, "SELECT * FROM register WHERE nama = '{$_SESSION['login']}'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <li class="nav-item">
                        <i class="fas fa-user "><a class="text-dark" href="profile-ubah.php" ><?php echo $d['nama']?></a></i>
                    </li>
                    <?php }?>
                    
                    
                    <li class="nav-item">
                    <i class=" fas fa-sign-out-alt me-3 text-dark"><a href="logout.php"class="text-dark" data-toogle="tooltip" title="Sign Out">LogOut</a></i>
                    </li>

                    
                </div>
                </div>
            </nav>
    </div>

    <div class="content-container">
        <div class="wrapper">
            <div class="content">
                <p class="keranjang">Keranjang</p>
                <br>
                <div class="dua">
                    <div class="list-checkout">
                        <br><br>
                        <ul class="checkout-items">
                        <?php 
                                if (!empty($_SESSION["cart"])) {
                                    foreach($_SESSION["cart"] as $cart =>$val){ 
                                        
                                ?>
                            <li>
                                
                                <label for="cb1" class="cb">
                                    <div class="card" style="width: 16rem; background-color: #F9D080;">
                                        <img src="product-men/<?php echo $val["gambar"];?>" alt="Kosong">
                                    </div>
                                    <div class="item-name">
                                        <p><?php echo $val["nama"]; ?></p>
                                        <p>Rp <?php echo  number_format($val["harga"]); ?> </p>
                                        <div class="edit">
                                            
                                            <div class="del-btn">
                                                <a href="hapus-cart.php?id=<?php echo $cart ?>"><img src="assets/delete.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <?php }}else{

                             ?>
                             <h5>Barang Kosong!</h5>
                             <?php }?>  
                        </ul>
                    </div>
                    
                    <div class="detail-checkout">
                        <p class="rb">Ringkasan Belanja</p>
                        <p class="tb">Total Belanja</p>
                        <?php
                        if (!empty($_SESSION["cart"])) {
                            $total_harga = 0;
                            foreach($_SESSION["cart"] as $cart =>$val){ 
                                $subtotal = $val["harga"]*$val["jumlah"];
                                ?>
                        <ul class="list-detail">
                            <li>
                                <div class="nama">
                                    <p><?php echo $val["nama"]; ?></p>
                                </div>
                                <div class="harga">
                                    <p>Rp <?php echo number_format($val["harga"]); ?></p>
                                </div>
                            </li>
                        </ul>
                        <?php
                            $total_harga+=$subtotal;}?>
                            <div class="total">
                            <p class="th">Total Harga:</p>
                            <p class="rp">Rp <?php echo number_format($total_harga) ?></p>
                            
                        </div>
                            <?php
                            }else{?>
                                <h5>Barang Belum Ada!!</h5>
                            <?php } ?>
                        <hr>
                        
                        
                        <div class="tombol">
                            <div></div>
                            <a href="checkout.php" class="buy-btn">Buy</a>
                        </div>  
                                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>