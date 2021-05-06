<?php
//session_start();
// if ( !isset($SESSION["login"])) {
//   header("Location: loginform.php");
//   exit;
// }
require 'koneksi.php';

if (isset($_POST["submit"])) {

  //var_dump($_POST);die;
  //cekkk data berhasil
  if (tambah($_POST) > 0) {
    echo "
    <script>
    alert('data berhasil ditambahkan!');
    document.location.href = 'index.php';
    </script>
    ";
  } else {

    echo "<script>
    alert('data gagal ditambahkan!');
    document.location.href = 'index.php';
    </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Nilai Semester</title>
</head>

<body>
  <form action="" method="POST" enctype="multipart/form-data">

    <ul>
      <li>
        <label for="semester">
          Semester
          <input type="text" name="semester" id="semester" required>
        </label>
      </li>
      <li>
        <label for="ipk">
          IPK
          <input type="text" name="ipk" id="ipk" required>
        </label>
      </li>
    </ul>

  </form>

</body>

</html>