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
    <link rel="stylesheet" href="style/style-profile.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <title>Profil</title>
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
                <i class="cart fas fa-shopping-cart ms-5"><a class="text-dark" href="keranjang.php" >Cart</a></i>
              </li>
              <?php 
              
              $data = mysqli_query($koneksi, "SELECT * FROM register WHERE nama = '{$_SESSION['login']}'");
              while ($d = mysqli_fetch_array($data)) {
              ?>
             <li class="nav-item">
                <i class="fas fa-user "><a class="text-dark" href="profile-save.php" style="text-decoration: underline;" ><?php echo $d['nama']?></a></i>
              </li>
              <?php }?>
              
              
              <li class="nav-item">
              <i class=" fas fa-sign-out-alt me-3 text-dark"><a href="logout.php"class="text-dark" data-toogle="tooltip" title="Sign Out">LogOut</a></i>
              </li>

              
          </div>
        </div>
    </nav>
    <div class="container">

    
    <div class="navigasi">
        <ul> <h1>Profil</h1>
        <?php 
            
                $data = mysqli_query($koneksi,"SELECT * FROM register WHERE nama = '{$_SESSION['login']}' ORDER BY register_id DESC ");
                
                while($row = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><p>Nama: <?php echo $row['nama'] ?></p> </td>
                <td><p>Kode Pos:    <?php echo ($row['kode_pos']) ?></p></td>
                <td><p> Alamat:  <?php echo ($row['alamat']) ?></p></td>
                <td><p> Tanggal Lahir:  <?php echo($row['tanggal_lahir']) ?></p></td>
              </tr>
              <?php } ?>
        
        <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM register WHERE nama = '{$_SESSION['login']}' ORDER BY register_id DESC ");
                
            while($row = mysqli_fetch_array($data)){
            ?>
        <h1>Contact: </h1>
        <td><p> Email: <?php echo ($row['email']) ?></p></td>
        <td><p> No.Handphone: <?php echo ($row['handphone']) ?></p></td>
        
        <?php } ?>
        <a href="profile-save.php"  class="btn btn-success " data-toogle="tooltip" title="Edit">Ubah</a>
        
        </ul>
        
        
        
        
     
    </div>
</div>
</body>
</html>