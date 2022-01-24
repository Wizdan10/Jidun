<?php 
  session_start();
  include 'koneksi.php';
  
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style/styleregristrasi.css" rel="stylesheet">
    <title>REGRISTASI CHILLDUST</title>
</head>

<body>
    <nav class="navbar-expand-lg navbar-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <a class="navbar-brand" href="#"> <b style="color: #026A00;">CHILLDUST</b></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-4">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#Registration"><i> <img src="img/account.png"
                                            style="margin-right: 10px;" alt="Dashboard"></i><b
                                        style="text-decoration: underline #F9D010;">Regist</b></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="border cool-md-10">

            <div class="container">
                <h1>
                    <b>REGIST</b>
                </h1>
                <p>
                    Anda akan menerima email konfirmasi ke alamat e-mail anda yang terkait dengan akun.<br>
                    Harap pastikan untuk memeriksa e-mail yang masuk dari CHILLDUST
                </p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><b>ALAMAT EMAIL</b></label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="exampleInputNama" class="form-label"><b>NAMA</b></label>
                                <input type="text" class="form-control" id="exampleInputNama"
                                    aria-describedby="emailHelp" name="nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label"><b>PASSWORD</b></label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                <p class="kata">Kata sandi minimal harus 8 karakter, dan terdiri dari huruf dan angka
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="exampleInputNohp" class="form-label"><b>NO.HP</b></label>
                                <input type="text" class="form-control" id="exampleInputNohp"
                                    aria-describedby="emailHelp" name="handphone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputKodepos" class="form-label"><b>KODE POS</b></label>
                                <input type="text" class="form-control" id="exampleInputKodepos" name="kode_pos">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="exampleInputAlamat" class="form-label"><b>ALAMAT</b></label>
                                <textarea type="text" class="form-control" id="exampleInputAlamat"
                                    aria-describedby="emailHelp" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="exampleInputTTL" class="form-label"><b>TANGGAL LAHIR</b></label>
                                <input type="date" class="form-control" id="exampleInputTTL" name="tanggal_lahir">
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn" value="REGIST" name="submit"></input>

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
                  
                $insert = mysqli_query($koneksi,"INSERT INTO register VALUES(
                    null,
                    '".$email."',
                    '".$password."',
                    '".$kode_pos."',
                    '".$tanggal_lahir."',
                    '".$nama."',
                    '".$handphone."',
                    '".$alamat."')");
                    if($insert){
                        echo '<script> alert("Register Berhasil") </script>';
                        echo '<script>window.location="login-user.php" </script>';
                    }else{
                        echo 'Gagal'.mysqli_error($koneksi);
                    }
              
              }
              ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>