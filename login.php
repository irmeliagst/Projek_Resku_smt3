<?php 
include 'koneksi.php';

if(isset($_POST['submit'])) {
  $user = $_POST['username'];
  $password = $_POST['password'];

  $_SESSION['pesan_sukses'] = "SUKSES";
  header('location:daftar_menu.php');

  // Query untuk memilih tabel
  $cek_data = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$user' AND password = '$password'");
  $hasil = mysqli_fetch_array($cek_data);
  $status = $hasil['status'];
  $login_user = $hasil['username'];
  $row = mysqli_num_rows($cek_data);

  // Pengecekan Kondisi Login Berhasil/Tidak
    if ($row > 0) {
        session_start();   
        $_SESSION['login_user'] = $login_user;

        if ($status == 'admin') {
          header('location: daftar_menu.php');
        }elseif ($status == 'user') {
          header('location: user.php'); 
        }
    }else{
        header("location: login.php");
    }
}
?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <title>Halaman Login</title>
  </head>
  <body>
  <!-- Form Login -->

    <div class ="container ">
      <!-- <h4 class="text-center">Silahkan isikan nama...</h4> -->
      <img src="images/ress.png" class="card-img-center" class="img-responsive" alt="Cinque Terre" width="370" height="180">
      <h4 class="text-center">Log-In</h4>
      <hr>
      <form method="POST" action="login.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
            </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
              </div>
              <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
          </div>
        </div>
        <center>  
        <button  type="submit" name="submit" class="btn btn-danger">LOGIN</button>
      </center>
      </form>
  <!-- Akhir Form Login -->

    </div>
    <br>
  <!-- Akhir Eksekusi Form Login -->







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="bootstrap/dist/js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>