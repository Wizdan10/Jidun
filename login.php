<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

     <!-- Bootstrap Icon -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

     <!-- AOS Style -->
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
     <!-- JavaScript -->
      <script src="script.js"></script>

    <title>Chilldust</title>
  </head>
  <body>
     <!-- Section -->
    <section class="jumbotron text-center ">
        <img src="img/chilldust.png" alt="Chilldust" width="180"
            class="rounded-circle " />
    </section>
    <!-- Akhir Section -->

    <!-- Login -->
      <h2 class="text-center pt-3">LOGIN <br> ADMIN</h1>
      <div class="container">
        <form action="" method="POST">
          <div class="row justify-content-center py-4">
            <div class="col-md-5">
              <div class="form-floating mb-3">
                <input type="email" class="email-login form-control"  placeholder="email" name="username" id="username">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="password-login form-control" name="password" id="password" placeholder="password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                <input class="btn btn-primary mb-3" type="submit" name="login" value="Login" ></input>
              </div>
            </div>
          </div>
        </form>
        <?php 
          if (isset($_POST['login'])) {
            include"koneksi.php";
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $cek_user = mysqli_query($koneksi,"SELECT * FROM login WHERE username = '".$username."' ");
            $row = mysqli_num_rows($cek_user);

            if ($row === 1) {
              # Jalankan prosedur seleksi password
              $fetch_pass = mysqli_fetch_assoc($cek_user);
              $cek_pass = $fetch_pass['password'];
              if ($cek_pass <> $pass) {
                echo"<script>alert('Password Salah');</script>";
              }else{
                $_SESSION['log']=true;
                echo"<script>alert('Login Berhasil'); document.location.href='dashboard.php'</script>";
              }
            }else{
              echo"<script>alert('Username Salah');</script>";
            }
          }
        
        
        ?>

      </div>
    <!-- Akhir Login -->
    
  </body>
</html>