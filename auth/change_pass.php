<?php 
include '../_config/config.php';
include '../layout/top.php';
if(!isset($_SESSION['role']) && !isset($_SESSION['username'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>"; 
} else {
    if(isset($_POST['submit'])) {
        $username = $_SESSION['username'];
        $pass_lama = sha1(trim(mysqli_real_escape_string($con, $_POST['pass_lama'])));
        $tampil = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$pass_lama'");
        $data = mysqli_fetch_array($tampil);
        
        //Jika data ditemukan, maka pass sesuai
        if($data){
            $pass_baru = $_POST['pass_baru'];
            $konfirm = $_POST['konfirmasi'];
        
            if($pass_baru == $konfirm){
                $pass_ok = sha1(trim(mysqli_real_escape_string($con, $konfirm)));
                $ubah = mysqli_query($con, "UPDATE tb_user SET password = '$pass_ok' WHERE id_user = '$data[id_user]' ");
        
                if($ubah) {
                    echo "<script>alert('Password Berhasil Diubah, Silahkan Login Ulang');
                    window.location='".base_url('auth/change_pass.php')."'</script>";
                }
            } else {
                echo "<script>alert('Password dan Konfirmasi Tidak Sesuai !');
                window.location='".base_url('auth/change_pass.php')."'</script>";
            }
        } else {
            echo "<script>alert('Password Tidak Ditemukan !');
                window.location='".base_url('auth/change_pass.php')."'</script>";
        }}
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tukar Password</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="card">
                <div class="card-header justify-content-center"></div>

                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" value="<?= $_SESSION['username'];?>">
                        <div class="form-group">
                            <label for="pass_lama">Password Lama</label>
                            <input
                                class="form-control"
                                type="password"
                                id="password"
                                name="pass_lama"
                                required="required">
                            <i class="far fa-eye" onclick="myFunction()"></i>
                        </div>
                        <div class="form-group">
                            <label for="pass_baru">Password Baru</label>
                            <input
                                class="form-control"
                                type="password"
                                id="password1"
                                name="pass_baru"
                                required="required">
                            <i class="far fa-eye" onclick="myFunction1()"></i>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi Password Baru</label>
                            <input
                                class="form-control"
                                type="password"
                                name="konfirmasi"
                                id="password2"
                                required="required">
                            <i class="far fa-eye" onclick="myFunction2()"></i>
                        </div>

                        <a href="../dashboard.php?page=<?=$_SESSION['role'];?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="submit" class="btn btn-primary float-right" onClick="return confirm('Yakin akan mengubah password?')">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<script src="<?=base_url()?>/assets/js/check.js">
</script>

<?php 
include '../layout/footer.php';
?>
<?php } ?>