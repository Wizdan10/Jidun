<?php 
  session_start();
  
  include 'koneksi.php';
  if(!isset($_SESSION['login'])){
    header("location: login-user.php");
    exit;
  }

 

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="style/style-men.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <title>Produk Men</title>
    
    
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
                <a class="nav-link active" aria-current="page" href="Produk Men-1.php" style="text-decoration: underline;">Men</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Produk Women.php">Women</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-danger" aria-current="page" href="Produk Sale.php" >Sale</a>
              </li>
              <li class="nav-item">
                <i class="cart fas fa-shopping-cart ms-5"><a class="text-dark" href="keranjang.php">Cart</a></i>
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
      


    <div class="navbar navbar-2">
          <div class="container">
                <ul>
                    <img src="img-men/tendencies_sweath-removebg-preview 1.png" alt="WOMEN_CARDIGAN">
                    <div class="vertikal"></div>
                    <img src="  img-men/under-armour-5048-3560092-4-removebg-preview 1.png" alt="women_Hoodie">
                    <div class="font-3">
                        <li class="font-4"><p> KOLEKSI HOODIE DAN SWEATER</p></li>
                        <li class="font-5"><p>Koleksi yang wajib di miliki,<br/>nyaman untuk kegiatan sehari-hari</p></li>
                    </div>
                </ul> 
        </div>
    </div>

    
      
    <div class="container">
      <div class="row">
      <?php
          $kategori = mysqli_query($koneksi,"SELECT * FROM tb_product WHERE product_jenis = 0 ORDER BY category_id DESC");
          if (mysqli_num_rows($kategori) > 0) {
            while($row = mysqli_fetch_array($kategori)){ ?>
      <div class="col-md-3 mb-3">
                <div class="card" style="width: 16rem; background-color: #F9D080;">
                    <div class="card-body">
                    <img src="product-men/<?php echo $row['product_image']?>"></a>
                    </div>
                </div>
                <p><?php echo $row['product_name'] ?> </p>
                <p>Rp. <?php echo number_format($row['product_price']) ?></p>
                <a href="add-cart.php?id=<?php echo $row['category_id'] ?>" class="btn cart text-white btn-success" name="add-cart" type="submit" value="Buy">Buy</a>
                <a href="buy.php?idt=<?php echo $row['category_id'] ?>" class="btn cart text-white" name="add-cart" type="submit" value="+Cart" style="background-color: #D98C00;">+Cart</a>
            </div>
            <?php }}else{ ?>
                    <tr>
                      <td colspan="8"><p class="text-center">Tidak ada data</p></td>
                    </tr>
                    <?php } ?>
            </div>
      </div>
    </div>
   
    
    
  </body>
</html>