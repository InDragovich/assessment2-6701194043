<?php 
require 'koneksi.php';
$nilai = query("SELECT * FROM ipk");
// session_start();
// if ( isset($SESSION["login"])) {
//   header("Location: index.php");
//   exit;
// }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Assessment 2</title>
</head>


<body>
    <!-- Navbar -->
    <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #000000;">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" width="120"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
        </ul>
        <div class="agile-login">
          
        
        <br>
        <?php
        if(!isset($_SESSION["login"])) :?>
        <a class="btn btn-sm btn-outline-secondary" href="loginform.php">Log In</a>
        <a class="btn btn-sm btn-outline-secondary" href="registrasi.php">Sign up</a>
        <?php else :?>
          <?php if ($_SESSION["role"]=="User")  ?>

        <?php endif ?>
          </div>
      </div>
    </div>
  </nav>
  <!-- /Navbar -->

    <div class="container">

        <a href="inputnilai.php" title="">Input Nilai</a>
        <table border="1" cellpadding="10" cellspacing="0">

            <tr>
                <th>No.</th>
                <th>Semester</th>
                <th>IPK</th>
            </tr>

            <?php $i = 1;  ?>
            <?php foreach ($nilai as $row) : ?>
            <tr>
                <td> <?= $i ?></td>
                <td><a href="updatenilai.php"id"]; ?>" class="btn btn-primary">Ubah</a>
                    <a href="hapusdata.php?id=<?= $row["id"]; ?>" class="btn btn-danger">Hapus</a>
                </td>
                <td><?= $row["id"]; ?></td>
                <td><?= $row["semester"]; ?></td>
                <td><?= $row["ipk"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Footer -->

    <footer class="footer mt-5 py-3 " style="background-color: #000000;">
        <div class="container">
            <span class="text-muted ">&copy;Agus Indra 2021</span>
            <p class="float-right"><a href="#">Back to top</a></p>
        </div>
    </footer>
    <!-- /Footer -->




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
</body>

</html>