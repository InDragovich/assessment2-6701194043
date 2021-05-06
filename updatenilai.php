<?php
require 'koneksi.php';

//ambil data di url
$id = $_GET['id'];

//query data berdasarkan id
$nilai = query("SELECT * FROM  WHERE ipk = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  //cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    echo "
		<script>
		alert('data berhasil diubah');
		document.location.href = 'index.php'
		</script>
			";
  } else {
    echo "
		<script>
		alert('data gagal diubah');
		document.location.href = 'index.php'
		</script>
			";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Nilai</title>
</head>

<body>
  <h1>Update data Hewan</h1>
  <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    <input type="hidden" name="id" value="<?= $nilai["id"]; ?>">
    <ul>
      <li>
        <label for="semester">Semester :</label>
        <input type="text" name="semester" id="semester" required value="<?= $nilai["semester"] ?>">
      </li>
      <li>
        <label for="ipk">Ipk :</label>
        <input type="ipk" name="ipk" id="ipk" value="<?= $nilai["ipk"] ?>">
      </li>
    </ul>
    <button type="submit" name="submit">Update Nilai</button>
  </form>
</body>

</html>