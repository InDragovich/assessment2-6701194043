<?php
$host        = "ec2-18-233-83-165.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = dcmgivdkils91u";
$credentials = "user = ntmzeddiidsezd
 password= e395ceec2d7a2be3c3e18597213cb399227fd12875b3beb3f288f7ae5e3a166d";

$conn = mysqli_connect("$host", "$port", "$dbname ", "$credentials");

//query
function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
 //tambah data
function tambah($data)
{
  global $conn;
  //ambil data dari tiap elemen dalam form
  $smt  = htmlspecialchars($data["semester"]);
  $ipk  = htmlspecialchars($data["ipk"]);

  //insert data
  $query = "INSERT INTO ipk
   VALUES 
   ('',$smt','$ipk');
";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


//tambah data user
function tambahuser($data)
{
  global $conn;
  //ambil data dari tiap elemen dalam form
  $nama = htmlspecialchars($data["nama"]);
  $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
  $email = htmlspecialchars($data["email"]);
  $username = strtolower(stripcslashes(htmlspecialchars($data["username"])));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $role = htmlspecialchars($data["role"]);

  //cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
if (mysqli_fetch_assoc($result)) {
  echo "<script>
        alert('Username sudah terdaftar!')
        </script>";
        return false;
}

  //cek konfirmasi password
  if ($password !==$password2) {
    echo "<script>
          alert ('Konfirmasi password tidak sesuai!');
          </script>";
          return false;
  }

//jenis kelamin belum di input
  // if (!isset($_POST["jeniskelamin"])) {
  //   echo "Jenis kelamin belum diinput!";
  //   return false;
  // }

//enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //insert data
  $query = "INSERT INTO user VALUES 
   ('','$nama','$jeniskelamin','$email','$username','$password','$role');
";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//hapus data
function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM ipk WHERE semester = $smt");
  return mysqli_affected_rows($conn);
}

//upload gambar
function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  //cek apakah tidak ada gambar yg diupload
if ( $error === 4) {
    echo "<script>
        alert('Pilih gambar terlebih dahulu!');
      </script>";
    return false;
  }

  //cek apakah yang diupload adalah gambar
//   $ekstensiGambarValid = ['jpg','jpeg','png'];
//   $ekstensiGambar = explode('.', $namaFile);
//   $ekstensiGambar = strtolower(end($ekstensiGambar));
//   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//     echo "<script>
//         alert('Yang diupload bukan berekstensi gambar!');
//       </script>";
//     return false;
//   }

  //cek jika ukuran terlalu besar
//   if ($ukuranFile > 5000000) {
//     echo "<script>
//         alert('Ukuran gambar terlalu besar!');
//       </script>";
//     return false;
//   }

//   //lolos pengecekan, gambar siap diupload
//   // generate nama gambar baru
//   $namaFileBaru = uniqid();
//   $namaFileBaru.= '.';
//   $namaFileBaru.= $ekstensiGambar;
//   move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
//   return $namaFileBaru;
// }

//ubah data
function ubah($data)
{
  global $conn;
  //ambil data dari tiap elemen dalam form
  $smt = $data["semester"];
  $ipk = htmlspecialchars($data["ipk"]);

  // query insert data
  $query = "UPDATE ipk SET
		semester = '$smt',
		ipk = '$ipk' 
		WHERE semester = $semester
		";

  mysqli_query($conn, $query);


  return mysqli_affected_rows($conn);
}

