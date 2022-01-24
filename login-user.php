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
    <link href="style/style-login.css" rel="stylesheet">
    <title>LOGIN CHILLDUST</title>
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
                                        style="text-decoration: underline #F9D010;">Login</b></a>
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
                    <b>LOGIN</b>
                </h1>
                <p>
                    Masukan dengan alamat e-mail dan kata sandi anda
                </p>
                <p class="text-danger"><b>Jangan menggunakan kata sandi yang telah anda gunakan<br>
                        di layanan lain atau sandi yang mudah ditebak.</b></p>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><b>USERNAME</b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><b>PASSWORD</b></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <p class="kata">Kata sandi minimal harus 8 karakter, dan terdiri dari huruf dan angka</p>
                    </div>

                    <input type="submit" class="btn" value="LOGIN" name="login"></input>
                    <a href="https://bit.ly/3zM7IEo" class="lupa text-dark mt-2">
                       <p>Lupa Sandi Anda?</p> 
                    </a>
                </form>
                <?php 
          if (isset($_POST['login'])) {
            include "koneksi.php";
            $nama = $_POST['nama'];
            $pass = $_POST['password'];

            $cek_user = mysqli_query($koneksi,"SELECT * FROM register WHERE nama = '$nama'");
            $row = mysqli_num_rows($cek_user);

            if ($row === 1) {
              # Jalankan prosedur seleksi password
              $fetch_pass = mysqli_fetch_assoc($cek_user);
              $cek_pass = $fetch_pass['password'];
              if ($cek_pass <> $pass) {
                echo"<script>alert('Password Salah');</script>";
              }else{
                $_SESSION['login']=true;
                $_SESSION['login']=$_POST['nama'];
                echo"<script>alert('Login Berhasil'); document.location.href='home.php'</script>";
              }
            }else{
              echo"<script>alert('Username Salah');</script>";
            }
          }
        ?>
                </div>
                <div class="regist">
                    <h1><b>REGIST</b></h1>
                    <p>Jika anda membuat akun, anda bisa mendapatkan
                        layanan yang dipersonalisasi seperti melihat riwayat
                        pembelian dan mendapatkan kupon diskon dengan
                        keanggotaan anda. Daftar hari ini, gratis!</p>
                    <a href="register.php"><input type="submit" class="btn"  value="REGIST"></input></a>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>