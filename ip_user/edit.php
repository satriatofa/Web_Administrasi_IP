<?php
include '../_config/config.php';
include '../layout/top.php';

$tampil = mysqli_query($con, "SELECT * FROM tb_ip,tb_user WHERE
tb_ip.id_user=tb_user.id_user AND id_ip='$_GET[update]'");
$data = mysqli_fetch_array($tampil);
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data IP Address</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Edit Data IP Addres
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="hidden" value="<?= $_SESSION['nama_lengkap']?>">
                            <label for="ip_start">IP Address</label>
                            <input
                                class="form-control"
                                type="text"
                                id="ip_address"
                                name="ip_address"
                                pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}"
                                value="<?php echo $data['ip_address'];?>"
                                title="Masukkan IP Address yang valid"
                                required="required">

                        </div>

                        <div class="form-group">
                            <label for="segment">Segment</label>
                            <input
                                class="form-control"
                                type="text"
                                id="segment"
                                name="segment"
                                value="<?php echo $data['segment'];?>">

                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input
                                class="form-control"
                                type="text"
                                id="status"
                                name="status"
                                value="<?php echo $data['status'];?>">

                        </div>
                        <div class="form-group">
                            <label for="switch">Switch Port</label>
                            <input
                                class="form-control"
                                type="text"
                                id="switch"
                                name="switch"
                                value="<?php echo $data['switch'];?>">

                        </div>
                        <div class="form-group">
                            <label for="keterangan_ip">Keterangan</label>
                            <input
                                class="form-control"
                                type="text"
                                name="keterangan_ip"
                                value="<?php echo $data['keterangan_ip'];?>">
                        </div>

                        <div class="form-group">
                            <label for="id_user">Updater</label>
                            <select class="browser-default custom-select" name="id_user">
                                <option value="">-- Pilih Updater --</option>
                                <?php
                                $nama_lengkap = $_SESSION['nama_lengkap'];
                                $data = mysqli_query($con, "SELECT * FROM tb_user WHERE nama_lengkap = '$nama_lengkap'");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                <option value="<?php echo $d['id_user']; ?>"><?php echo $d['nama_lengkap']; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <a href="./index.php" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="proses" class="btn btn-primary float-right">Edit IP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['proses'])) {
    mysqli_query($con,"UPDATE tb_ip set
    ip_address = '$_POST[ip_address]',
    segment = '$_POST[segment]',
    status = '$_POST[status]',
    switch = '$_POST[switch]',
    keterangan_ip = '$_POST[keterangan_ip]',
    id_user = '$_POST[id_user]'
    WHERE id_ip=$_GET[update]") or die(mysqli_error($con));

    echo "<script>alert('Data Berhasil Diubah');
    window.location='".base_url('ip_user/index.php')."';</script>";
}
?>
<!-- End of Main Content -->
<?php 
include '../layout/footer.php';
?>