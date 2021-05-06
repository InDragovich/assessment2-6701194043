
<?php
require 'koneksi.php';
if (isset($_POST["submit"])) {
  //cekkk data berhasil
  if (tambahuser($_POST) > 0) {
    echo "
    <script>
    alert('Anda sudah terdaftar di website kami!');
    document.location.href = 'index.php';
    </script>
    ";
  } else {

    echo mysqli_error($conn);
  }
  if (empty($_POST['jeniskelamin'])) {
      $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2 class="alert alert-primary text-center mt-3">Sign Up</h2>
        <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <a href="index.php" class="float-right" title="">
        <small>Home</small>
    </a>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <?php   if (isset($error)) : ?>
                <p style="color: red; font-style: italic;">*Jenis kelamin jangan kosong! </p>
            <?php endif;   ?>
                <div class="form-check">
                    <input type="radio" name="jeniskelamin" class="form-check-input" id="radio2"  value="Laki - Laki">
                <label>Laki-Laki</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="jeniskelamin" class="form-check-input" id="radio2" value="Perempuan">
                <label>Perempuan</label>
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Masukkan Email Anda">
            </div>

            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username anda">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda">
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Masukkan Password Anda">
            </div>
            <div class="form-group">
                <!-- <label>Role</label> -->
                <div class="form-check">
                    <input type="hidden" name="role" class="form-check-input" id="radio2"  checked="" value="User">
                </div>

            <button type="submit" name="submit" id="password2" class="btn btn-primary">Sign Up</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <br>
            <small>Sudah punya akun? </small>
            <a href="loginform.php" title="">
                <small>Klik disini untuk login</small>
            </a>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>