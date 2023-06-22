<?php 
include '../_config/config.php';
include '../layout/top.php';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data IP Address</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Mahasiswa
                </div>

                <div class="card-body">
                    <form action="cek_create.php" method="POST">
                        <div class="form-group">
                            <label for="ip_start">IP Address Awal</label>
                            <input
                                class="form-control"
                                type="text"
                                id="ip_start"
                                name="ip_start"
                                pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}"
                                title="Masukkan IP Address yang valid"
                                required="required">

                        </div>
                        <div class="form-group">
                            <label for="nim">IP Address Akhir</label>
                            <input
                                class="form-control"
                                type="text"
                                id="ip_end"
                                name="ip_end"
                                pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}"
                                title="Masukkan IP Address yang valid"
                                required="required">

                        </div>
                        <div class="form-group">
                            <label for="segment">Segment</label>
                            <input class="form-control" type="text" id="segment" name="segment">

                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input class="form-control" type="text" id="status" name="status">

                        </div>
                        <div class="form-group">
                            <label for="switch">Switch Port</label>
                            <input class="form-control" type="text" id="switch" name="switch">

                        </div>
                        <div class="form-group">
                            <label for="keterangan_ip">Keterangan</label>
                            <input class="form-control" type="text" name="keterangan_ip">
                        </div>
                        
                        <div class="form-group">
                            <label for="id_user">Updater</label>
                            <select class="browser-default custom-select" name="id_user">
                                <option value="">-- Pilih Updater --</option>
                                <?php
                                    $data = mysqli_query($con, "select * from tb_user");
                                    while ($d = mysqli_fetch_array($data)) {
                                ?>
                                <option value="<?php echo $d['id_user']; ?>"><?php echo $_POST['nama_lengkap']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>

                        </div>
                        <a href="./index.php" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah IP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include '../layout/footer.php';
?>