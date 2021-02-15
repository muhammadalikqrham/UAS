<?php 
session_start();
if (isset($_SESSION['login'])) {
    header("Location: admin.php ");
    exit;
  }
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - SIAK POLNES</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .marginT{
            margin-top: 25%;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg marginT ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="apps/login/verifLogin.php" method="POST" onsubmit="return validateForm();">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user username"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username..." name="userid" aria-describedby="invalidFeedback">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user password"
                                                id="exampleInputPassword" placeholder="Password..." name="pass">
                                                <div class="invalid-feedback" id="invalidFeedback">Username atau password Salah</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block btn-login" value="Login" name="login">
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registrasi.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <?php 
    
    if ($_SESSION['status'] == 'gagal') {
        echo '<script>$("input.form-control-user").addClass("is-invalid");</script>';
        unset($_SESSION['status']); 
    }
    else {
        unset($_SESSION['status']);
    }

    ?>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php if (isset($_SESSION['status'])) :?>
  <script>
            Swal.fire({
                    position: 'center',
                    icon: '<?=$_SESSION['icon']?>',
                    title: 'Data Anda <?=$_SESSION['status']?> <?=$_SESSION['keterangan']?>',
                    showConfirmButton: false,
                    timer: 1500
                  })
  </script>
  <?php var_dump($_SESSION) ?>
  <?php unset($_SESSION['icon']); ?>
  <?php unset($_SESSION['status']); ?>
  <?php unset($_SESSION['keterangan']);?>
<?php endif; ?>
      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>