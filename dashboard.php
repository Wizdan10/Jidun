<?php 
  session_start();
  include 'koneksi.php';
  if(!isset($_SESSION['log']) ){
    header('location: ../login.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Dashboard</title>
  </head>
  <body>
     <!-- AWAL NAVBAR -->
     <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #0EA691;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="font-family: Poopins;">SELAMAT DATANG ADMIN |<b> CHILLDUST</b> </a>
            <div class="icon ms-4">
              <h5>
                <a href="login.php" class="fas fa-sign-out-alt me-3 text-dark" data-toogle="tooltip" title="Sign Out"></a>
              </h5>
            </div>
          </div>
        </div>
      </nav>
     <!-- AKHIR NAVBAR -->
    <!-- AWAL NAVBAR VERTICAL -->
      <div class="row no-gutters">
        <div class="col-md-2 pe-3 pt-4 bg-dark">
          <ul class="nav flex-column ml-3 mb-5" id="nav-vertical">
            <li class="nav-item">
              <a class="nav-link text-white" href="dashboard.php"><img class="pb-2" src="img/dashboard-svgrepo-com 1.png" alt="Dashboard" style="width: 20px;"> Dashboard</a><hr class="bg-white ">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftarbarang.php"><img class="pb-2 me-1" src="img/add-item-alt-svgrepo-com 1.png" alt="DaftarBarang" style="width: 20px;">Daftar Barang</a><hr class="bg-white" >
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftarpengguna.php"><img class="pb-2 me-1" src="img/user-svgrepo-com 2.png" alt="DaftarPengguna" style="width: 20px;">Daftar Pengguna</a><hr class="bg-white ">
            </li>
          </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
          <h3><i > <img src="img/dashboard-svgrepo-com 2.png" alt="Dashboard" style="width: 35px; margin-top: -10px; margin-right: 20px;"></i>DASHBOARD</h3><hr>
          <div class="row text-white">
            <div class="card ms-4" style="width: 18rem; background-color: #396EB0;">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="cart"><img src="img/cart-svgrepo-com 1.png" alt=""></i>
                    </div>
                    <?php 
                   $tampil = "SELECT * FROM pembelian";
                   $query = mysqli_query($koneksi,$tampil);
                   $pembelian = mysqli_num_rows($query);
                                   ?>
                    <h5 class="card-title">JUMLAH PESANAN</h5>
                    <div class="display-4 ps-5"><?php echo "$pembelian"; ?></div>
                    <a href="detail-pembelian.php" class=" text-white"><p class="card-text">Lihat Detail <i class="fas fa-angle-double-right me-2"></i></p></a>
                   
                  </div>
                </div>
                <div class="card ml-5" style="width: 18rem; background-color: #B97A95;">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="cart-1"><img src="img/user-svgrepo-com 1.png" alt=""></i>
                    </div>
                    <h5 class="card-title">JUMLAH PENGGUNA</h5>
                    <?php 
                   $tampil = "SELECT * FROM register";
                   $query = mysqli_query($koneksi,$tampil);
                   $count = mysqli_num_rows($query);
                                   ?>
                    <div class="display-4 ps-5"><?php echo "$count"; ?></div>
                    
                    <a href="daftarpengguna.php" class=" text-white"><p class="card-text">Lihat Detail <i class="fas fa-angle-double-right me-2"></i></p></a>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     <!-- AKHIR NAVBAR  VERTICAL-->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>