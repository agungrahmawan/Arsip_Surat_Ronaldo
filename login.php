<?php 
    error_reporting(0);
    session_start();
	include 'config/db.php';
    $query2 = mysqli_query($conn, "SELECT * FROM tb_instansi");
    $it = mysqli_fetch_array($query2);
    if(isset($_SESSION['user'])) {
        echo "<script language='javascript'>document.location.href='index.php';</script>";
    } else { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Arsip Surat</title>

    <!-- Custom fonts for this template-->
    <link href="assets/logo/<?= $it['logo'] ?>" rel="shortcut icon">
    <script src="https://kit.fontawesome.com/01784279a5.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5"> 
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Aplikasi</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat
                                                    Saya</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                        <hr>
                                    </form>

                                    <?php
                                    if(isset($_POST['login'])){
                                        $username = isset($_POST['username']) ? $_POST['username'] : '';
                                        $password = isset($_POST['password']) ? $_POST['password'] : '';
                                        
                                        //anti bypass admin
                                        $user = mysqli_real_escape_string($conn, $username);
                                        $pass = mysqli_real_escape_string($conn, $password);

                                        $login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'");
                                        $data = mysqli_fetch_array($login);
                                        $cek = mysqli_num_rows($login);
                                        $level = $data['level'];
                                        $user = $data['nama'];
                                        $id = $data['id_user'];

                                        if($cek > 0) {
                                            $_SESSION['level'] = $level;
                                            $_SESSION['user'] = $user;
                                            $_SESSION['id_user'] = $id;
                                            $_SESSION['login'] = true;

                                            echo "<script language='javascript'>alert('Selamat datang !!!'); document.location.href='index.php'; </script>";
                                        } else {
                                            echo "<script language='javascript'>alert('Username atau Password Salah'); document.location.href='login.php'; </script>";
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
    }
?>