<?php 
include 'koneksi.php';
// if (!$id_login) {
//   header("Location: daftar_menu.php");
// }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <title>Halaman Tambah Menu</title>
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">Talaman Tambah Menu</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="tambah_menu.php" enctype="multipart/form-data">
      <!-- <div class="form-group">
          <label for="id1">id</label>
          <input type="text" class="form-control" id="id1" name="id">
        </div> -->
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="text" class="form-control" id="menu1" name="nama_menu" required>
        </div>
        <!-- <div class="form-group">
          <label for="jenis">Jenis Menu</label><br>
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_menu" id="jk" value="Makanan">
          <label class="form-check-label" for="jenis">Makanan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_menu" id="jk" value="Minuman">
          <label class="form-check-label" for="jenis">Minuman</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_menu" id="jk" value="Camilan">
          <label class="form-check-label" for="jenis">Camilan</label>
        </div> -->
            <!-- <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Makanan" name="jenis_menu" checked>Makanan 
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Minuman" name="jenis_menu">Minuman
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Camilan" name="jenis_menu">Camilan
            </label>
          </div> -->
         
        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="text" class="form-control" id="harga1" name="harga"  required>
        </div>
        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" required>
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
      </form>

      <?php 

  if(isset($_POST['tambah'])){
    $id = '';
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    echo $nama.$harga;

  
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg','gif');
			$gambar = $_FILES['gambar']['name'];
      echo $gambar;
			$x = explode('.', $gambar);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['gambar']['size'];
			$file_tmp = $_FILES['gambar']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'images/'.$gambar);
        try {
          $insert = mysqli_query($koneksi, "INSERT INTO `menu`(`id`, `gambar`, `nama`, `harga`) VALUES ('$id', 'aha', '$nama', '$harga')");
          print_r($insert);
          new Exception("eror"); 
          if($insert){
            header("Location: daftar_menu.php");
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
            print_r($insert);
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
        } catch (Exception $e) {
          echo $e->getMessage();
        }
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
    // if($insert){
    //   header("location: daftar_menu.php");
    // }
    // else {
    //   echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    // }
  

   ?>

  </div>
  </div>
  <!-- Akhir Form Registrasi -->


  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>