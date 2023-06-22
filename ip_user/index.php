<?php 
include '../_config/config.php';
include '../layout/top.php';
?>

<div class="container-fluid">
    <div
        class="card-header">
        <h1 class="h3 mb-2 text-gray-800">Data IP Address</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <!-- <a href="./create.php" class="btn btn-primary">Tambah Data</a> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ip Address</th>
                                <th>Segment</th>
                                <th>Status</th>
                                <th>Switch Port</th>
                                <th>Keterangan</th>
                                <th>Updater</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $no=1;
                        $tampil = mysqli_query($con,"SELECT * FROM tb_ip, tb_user WHERE
                        tb_ip.id_user=tb_user.id_user");
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['ip_address'] ?></td>
                                <td><?php echo $data['segment'] ?></td>
                                <td><?php echo $data['status'] ?></td>
                                <td><?php echo $data['switch'] ?></td>
                                <td><?php echo $data['keterangan_ip'] ?></td>
                                <td><?php echo $data['nama_lengkap'] ?></td>
                                <td>
                                    <a class='btn btn-sm btn-info' href="edit.php?update=<?=$data['id_ip'];?>">EDIT</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Proses delete -->
<?php 
if(isset($_GET['delete'])) {
  mysqli_query($con,"DELETE FROM tb_ip where id_ip='$_GET[delete]'")
  or die (mysqli_error($con));
  echo "<script>alert('Data berhasil dihapus');
  window.location='".base_url('ip_user/index.php')."';</script>";
}
?>

<?php 
include '../layout/footer.php';
?>