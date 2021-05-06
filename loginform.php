<?php
session_start();

if (isset($SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';
if (isset($_POST["login"])) {
  //cekkk data berhasil
  $username = $_POST["username"];
  //$email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$username'");

  //cek username
  if (mysqli_num_rows($result) === 1) {
      //cek password
        $row = mysqli_fetch_assoc($result);
        $role = $row["role"];
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            echo "<script>
                    alert('Anda berhasil login');
                </script>";
            header("Location: index.php");
            exit;
        }
    }
    $error = true;

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

    <title>Log in</title>
</head>
<body>
    <!-- form -->
    <!-- Mengatur margin kanan kiri atas, membuat box shadow, dan padding-->
    <form style="max-width: 480px; margin: auto; margin-top:9%; box-shadow: 0 3px 20px rgba(0,0,0,0.3); padding: 30px; " method="post">
        <a href="index.php" class="float-right" title="">
            <small>Home</small>
        </a>
        <div class="form-group text-center">
            <h1 class="h2 mb-3 font-weight-normal" class="form-group text-center">Please log in</h1>
            <?php   if (isset($error)) : ?>
                <p style="color: red; font-style: italic;">Email, Username atau Password anda salah! </p>
            <?php endif;   ?>
        </div>
        <div>
            <label  for="exampleInputUsername1">Email or Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputUsername1" >
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>

        <button type="submit" name="login" class="btn btn-primary">Login</button><br>
        <small>Belum punya akun?</small>
        <a href="registrasi.php" title="">
            <small> Klik disini untuk mendaftar</small>
        </a>
    </form>
    <!-- /form -->
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