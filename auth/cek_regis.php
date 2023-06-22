<?php
require_once '../_config/config.php';

if(isset($_POST['submit'])) {
  $nama_lengkap = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
  $date_created = time();
  $role = 'User';
  // Melakukan validasi data yang diinputkan (bisa ditambahkan validasi lain sesuai kebutuhan)
  if(empty($nama_lengkap) || empty($username) || empty($password)) {
    echo "<script>alert('Harap lengkapi semua field.');
    window.location='".base_url('auth/registrasi.php')."'</script>";
} else {
    // Melakukan query untuk memeriksa apakah username sudah digunakan sebelumnya
    $check_query = "SELECT * FROM tb_user WHERE username='$username'";
    $check_result = $con->query($check_query);
    
    if($check_result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan, harap gunakan username lain.');
        window.location='".base_url('auth/registrasi.php')."'";
    } else {
        // Menambahkan user baru ke database
        $insert_query = "INSERT INTO tb_user (nama_lengkap, username, password, role, date_created) VALUES ('$nama_lengkap', '$username', '$password', '$role', '$date_created')";
        if($con->query($insert_query) === TRUE) {
            echo "<script>alert('User berhasil dibuat!');
            window.location='".base_url('dashboard.php?page=Admin')."';</script>";
        } else {
            echo "Error: " . $insert_query . "<br>" . $con->error;
        }
    }
    
    // Menutup koneksi ke database
    $con->close();
}
}
?>