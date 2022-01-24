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
    <title>Home</title>
    
    
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
                <a class="nav-link active" aria-current="page" href="home.php"style="text-decoration: underline;">Home</a>
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
      


    <div class="navbar navbar-3">
          <div class="container">
                <ul>
                <h5>Halo, Selamat Datang </h5>
                        <h1 class="font-6">Temukan Pakaian Terbaik <br>Yang Kamu Sukai</h1>
                    <h5>Temukanlah pakaian yang membuatmu nyaman <br>dengan harga terjangkau</b></h1>
                    <img class="foto-3" src="img/hoodie_2-removebg-preview 1.png" alt="WOMEN_CARDIGAN">
                    <img class="foto-2" src="img/jaket1-removebg-preview 1.png" alt="WOMEN_CARDIGAN">
                    <img class="foto-1" src="img/HOODIE_1-removebg-preview 1.png" alt="women_Hoodie">
                    
            </ul> 
        </div>
    </div>
   
    <div class="container">
      <div class="row">
        <div class="col-md-13 mb-3 ms-4">
          <div class="navbar navbar-4">
              <ul>
                  <h5>Outdoor Jacket Duffle Fluke Wool  <br>Oversize</b></h1>
                  <p>Memiliki bahan yang halus <br>sehingga membuat nyaman <br> ketika digunakan</p>
                  <img class="foto-4" src="img-men/JAKET2-removebg-preview 1.png" alt="WOMEN_CARDIGAN">    
            </ul> 
          </div>
          <div class="navbar navbar-5">
              <ul>
                  <h5>Pullover Sweet Hoodie Dark Blue  <br>Long Hand</b></h1>
                  <p>Memiliki bahan yang halus <br>sehingga membuat nyaman<br> ketika digunakan</p>
                  <img class="foto-4" src="img-men/HOODIE_3-removebg-preview 1.png" alt="WOMEN_CARDIGAN">    
              </ul> 
          </div>
        </div>
      </div>
    </div>
    
    
  </body>
</html>