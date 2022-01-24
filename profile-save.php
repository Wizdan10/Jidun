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
<head> <link rel="stylesheet" href="style/style-men.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <title>Profile</title>
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
                <i class="cart fas fa-shopping-cart ms-5"><a class="text-dark" href="keranjang.php">Cart</a></i>
              </li>
              <?php 
                        $data = mysqli_query($koneksi, "SELECT * FROM register WHERE nama = '{$_SESSION['login']}'");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                       <li class="nav-item">
                          <i class="fas fa-user "><a class="text-dark" href="profile-ubah.php" style="text-decoration: underline;"><?php echo $d['nama']?></a></i>
                        </li>
                        <?php }?>
              <li class="nav-item">
              <i class=" fas fa-sign-out-alt me-3 text-dark"><a href="logout.php"class="text-dark" data-toogle="tooltip" title="Sign Out">LogOut</a></i>
              </li>

              
          </div>
        </div>
    </nav>



    <form action="" method="POST">
        <div class="container">
            <div class="navigasi">
                <h1>Ubah Biodata Diri</h1>
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputNama" class="form-label"><b>NAMA</b></label>
                            <input type="text" class="form-control" id="exampleInputNama"
                                aria-describedby="emailHelp" name="nama">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputPassword1" class="form-label"><b>PASSWORD</b></label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            <p class="kata">Kata sandi minimal harus 8 karakter, dan terdiri dari huruf dan angka
                            </p>
                        </div>
                    </div>
                
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputKodepos" class="form-label"><b>KODE POS</b></label>
                            <input type="text" class="form-control" id="exampleInputKodepos" name="kode_pos">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputAlamat" class="form-label"><b>ALAMAT</b></label>
                            <textarea type="text" class="form-control" id="exampleInputAlamat"
                                aria-describedby="emailHelp" name="alamat"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputTTL" class="form-label"><b>TANGGAL LAHIR</b></label>
                            <input type="date" class="form-control" id="exampleInputTTL" name="tanggal_lahir">
                        </div>
                    </div>
                </div>

                <div class="line"> 

                </div>
                <h1>Ubah Contact</h1> 
                <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputEmail1" class="form-label"><b>EMAIL</b></label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3 ms-3">
                            <label for="exampleInputNohp" class="form-label"><b>NO.HP</b></label>
                            <input type="text" class="form-control" id="exampleInputNohp"
                                aria-describedby="emailHelp" name="handphone">
                        </div>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-success me-5 ms-3" value="Save" name="submit">
        
            
            </div>
        </div>
    </form>
    <?php 
              if (isset($_POST['submit'])) {
                $nama= $_POST['nama'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $handphone = $_POST['handphone'];
                $kode_pos = $_POST['kode_pos'];
                $alamat = $_POST['alamat'];
                $tanggal_lahir= $_POST['tanggal_lahir'];

                
                $update=mysqli_query($koneksi, "UPDATE register SET
                                      email='".$email."',
                                      password='".$password."',
                                      kode_pos='".$kode_pos."',
                                      tanggal_lahir='".$tanggal_lahir."',
                                      nama='".$nama."',
                                      handphone='".$handphone."',
                                      alamat='".$alamat."'
                                      WHERE nama ='{$_SESSION['login']}' ");
                                
                if ($update) {
                  $_SESSION['login']=$_POST['nama'];
                  echo '<script> alert("Ubah Data Berhasil") </script>';
                  echo '<script>window.location="Produk Men-1.php" </script>';
                }else{
                  echo 'Gagal '.mysqli_error($koneksi);
                }
                
                }
              
              ?>
</body>
</html>