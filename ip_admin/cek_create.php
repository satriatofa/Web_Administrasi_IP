<?php
require_once '../_config/config.php';

// Mengambil nilai IP awal dan akhir dari inputan
$ipStart = $_POST['ip_start'];
$ipEnd = $_POST['ip_end'];
$status = $_POST['status'];
$segment = $_POST['segment'];
$switch = $_POST['switch'];
$keterangan = $_POST['keterangan_ip'];
$id_user = $_POST['id_user'];


$query = "SELECT * FROM tb_ip WHERE ip_start = '$ipStart' AND ip_end = '$ipEnd'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Alamat IP sudah ada dalam tabel
    echo "<script>alert('IP sudah ada');
    window.location='".base_url('ip_admin/create.php')."';</script>";
} else {
    // Alamat IP belum ada dalam tabel
// Fungsi untuk memvalidasi angka IP
function validateIP($ip)
{
    // Memisahkan IP menjadi bagian-bagian
    $parts = explode(".", $ip);
    
    // Memastikan ada 4 bagian
    if (count($parts) != 4) {
        return false;
    }
    
    // Memastikan setiap bagian merupakan angka yang valid (0-255)
    foreach ($parts as $part) {
        if ($part < 0 || $part > 255) {
            return false;
        }
    }
    
    return true;
}



// Memvalidasi IP awal dan akhir
if (!validateIP($ipStart) || !validateIP($ipEnd)) {
    echo "IP address tidak valid.";
    exit;
}

// Mengubah IP awal dan akhir menjadi angka untuk perbandingan
$start = ip2long($ipStart);
$end = ip2long($ipEnd);

// Memastikan IP awal lebih kecil dari IP akhir
if ($start > $end) {
    echo "<script>alert('IP address awal harus lebih kecil dari IP address akhir');
    window.location='".base_url('ip_admin/create.php')."';</script>";
    exit;
}

// Memasukkan IP address ke dalam array
$ipAddresses = [];
for ($i = $start; $i <= $end; $i++) {
    $ip = long2ip($i);
    $ipAddresses[] = $ip;
}

foreach ($ipAddresses as $ip) {
$query = mysqli_query($con, "insert into tb_ip (ip_address,segment,status,switch,keterangan_ip,id_user) value('$ip','$segment','$status','$switch','$keterangan','$id_user')");
if ($query) {
  echo "<script>alert('Data berhasil ditambah');
  window.location='".base_url('ip_admin/index.php')."';</script>";
} else {
  echo "<script>alert('Data gagal ditambah');
  window.location='".base_url('ip_admin/create.php')."';</script>";
}
}
}
?>