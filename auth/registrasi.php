<?php 
require_once '../_config/config.php';
if(!isset($_SESSION['role']) && !isset($_SESSION['username'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>"; 
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title> Registrasi ADM - IP</title>
    <link href="../assets/img/infomediaicon.png" rel='shortcut icon'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="../assets/img/Infomediaicon.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" action="cek_regis.php" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="nama_lengkap">Nama Lengkap</label>
									<input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="" required autofocus>
									<div class="invalid-feedback">
										Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<input id="username" type="username" class="form-control" name="username" value="" required>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="align-items-center d-flex">
									<button type="submit" name="submit" class="btn btn-primary ms-auto">
										Register	
									</button>
								</div>
								<a href="../dashboard.php?page=<?=$_SESSION['role'];?>">Kembali ke dashboard</a>
							</form>
						</div>
						<!-- <div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="login.php" class="text-dark">Login</a>
							</div>
						</div> -->
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; ITCC Infomedia 2023 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/login.js"></script>
</body>
</html>
<?php } ?>