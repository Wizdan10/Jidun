<?php 
  session_start();
  include 'koneksi.php';
  if ($_SESSION['log']!= true) {
    echo'<script> window.location=login.php </script>';
    
  }
  $kategori = mysqli_query($koneksi,"SELECT * FROM tb_product WHERE category_id = '".$_GET['id']."' ");
  $p =mysqli_fetch_object($kategori);
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
                <a class="fas fa-sign-out-alt me-3 text-dark" href="logout_admin.php" data-toogle="tooltip" title="Sign Out"></a>
              </h5>
            </div>
          </div>
        </div>
      </nav>
     <!-- AKHIR NAVBAR -->
    <!-- AWAL NAVBAR VERTICAL -->
      <div class="row no-gutters">
        <div class="col-md-2 bg-dark pe-3 pt-4">
          <ul class="nav flex-column ml-3 mb-5" id="nav-vertical">
            <li class="nav-item">
              <a class="nav-link text-white" href="dashboard.php"><img class="pb-2" src="img/dashboard-svgrepo-com 1.png" alt="Dashboard" style="width: 20px;"> Dashboard</a><hr class="bg-white ">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftarbarang.php"><img class="pb-2 me-1" src="img/add-item-alt-svgrepo-com 1.png" alt="Dashboard" style="width: 20px;">Daftar Barang</a><hr class="bg-white" >
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftarpengguna.php"><img class="pb-2 me-1" src="img/user-svgrepo-com 2.png" alt="Dashboard" style="width: 20px;">Daftar Pengguna</a><hr class="bg-white ">
            </li>
          </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
          <h3><i > <img src="img/add-item-alt-svgrepo-com 2.png" alt="TambahBarang" style="width: 35px; margin-top: -10px; margin-right: 20px;"></i>EDIT BARANG</h3><hr>
          
          <section id="border-add-1" >
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="container">
                <div class="mb-2">
                    <h5 class="pt-3">Judul Produk</h5>
                    <input type="text" name="nama" class="form-control" value="<?php echo $p->product_name?>" required>
                    <h5 class="pt-3">Harga</h5>
                    <input type="text" name="harga" class="form-control" value="<?php echo $p->product_price?>" required>
                    <h5 class="pt-3">Unggah Gambar</h5>
                    <img src="product-men/<?php echo $p->product_image ?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                    <input class="form-control" name="gambar" type="file">
                  
                   <select name="status" class="form-select mt-5" aria-label="Default select example" style="width: 50%;" required>
                    <option selected>--Pilih--</option>
                    <option value="0" <?php echo ($p->product_status==0)? 'selected':'';?>>New</option>
                    <option value="1" <?php echo ($p->product_status==1)? 'selected':'';?>>Sale</option>
                  </select>
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  
                </div>
                </div>
              </div>
            </form>
            <?php 
              if (isset($_POST['submit'])) {
                $nama= $_POST['nama'];
                $harga= $_POST['harga'];
                $foto= $_POST['foto'];
                $status= $_POST['status'];

                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                
                if ($filename != '') {
                  $type1=explode('.', $filename);
                  $type2=$type1[1];
  
                  $newname = 'product-men'.time().'.'.$type2;

                  $tipe_diizinkan = array('jpg','jpeg','png','gif');

                  if (!in_array($type2,$tipe_diizinkan)) {
                    echo 'Format file tidak diizinkan';
                  }else{
                    unlink('./product-men/'.$foto);
                    move_uploaded_file($tmp_name, './product-men/'.$newname);
                    $namagambar = $newname;
                  }
                }else{
                    $namagambar = $foto;
                }
                $update=mysqli_query($koneksi, "UPDATE tb_product SET
                                      product_name='".$nama."',
                                      product_price='".$harga."',
                                      product_image='".$namagambar."',
                                      product_status='".$status."' 
                                      WHERE category_id = '".$p->category_id."' ");
                
                if ($update) {
                  echo '<script> alert("Ubah Data Berhasil") </script>';
                  echo '<script>window.location="daftarbarang.php" </script>';
                }else{
                  echo 'Gagal '.mysqli_error($koneksi);
                }
                
                }
              
              ?>
          </section>

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