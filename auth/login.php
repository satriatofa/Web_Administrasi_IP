<?php 
include '../_config/config.php';
if(isset($_POST['login'])) {
	$username = trim(mysqli_real_escape_string($con, $_POST['username']));
	$password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
	$query = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die (mysqli_error($con));

	//Cek pengguna
	if (mysqli_num_rows($query) != 0) {
		$row = mysqli_fetch_assoc($query);
		// $_SESSION['username'] = $username;
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
		if ($row['role'] == 'Admin') {
			header("location: " . base_url() . '/dashboard.php?page=Admin');
		} else if ($row['role'] == 'User') {
			header("location: " . base_url() . '/dashboard.php?page=User');
		}
	} else {
		echo "<script>alert('Username & Password Tidak Ada !');
		window.location='".base_url('auth/login.php')."'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta
            name="description"
            content="This is a login page template based on Bootstrap 5">
        <title>Login - ADM IP</title>
        <link href="<?=base_url()?>/assets/img/infomediaicon.png" rel='shortcut icon'>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
            crossorigin="anonymous">
    </head>

    <body>
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-5">
                            <img src="<?=base_url()?>/assets/img/Infomediaicon.png" alt="logo" width="100">
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="username">Username</label>
                                        <input
                                            id="username"
                                            type="text"
                                            class="form-control"
                                            name="username"
                                            required="required"
                                            autofocus="autofocus">
                                        <div class="invalid-feedback">
                                            Username is invalid
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="mb-2 w-100">
                                            <label class="text-muted" for="password">Password</label>
                                            <!-- <a href="forgot.html" class="float-end"> Forgot Password? </a> -->
                                        </div>
                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control"
                                            name="password"
                                            required="required">
                                        <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                onclick="myFunction()">
                                            <label for="remember" class="form-check-label">Show Password</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <button type="submit" name="login" class="btn btn-primary ms-auto">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <br><br>
                            <!-- <div class="card-footer py-3 border-0"> <div class="text-center"> Don't
                            have an account? <a href="registrasi.php" class="text-dark">Create One</a>
                            </div> </div> -->
                        </div>
                        <br><br>
                        <div class="text-center mt-5 text-muted">
                            Copyright &copy; ITCC Infomedia 2023
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?=base_url()?>/assets/js/login.js"></script>
        <script type="text/javascript">
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>