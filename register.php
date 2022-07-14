<?php

include('admin/security.php');
error_reporting(0);


if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $confpass = md5($_POST['confpass']);

    if ($password == $confpass) {
        $sql = "SELECT * FROM `users` WHERE email = '$email' or username = '$username';";
        $result = mysqli_query($connect, $sql);
        $resultcheck = mysqli_num_rows($result);
        if (!$resultcheck > 0) {
            $sql = "INSERT INTO `users` (`fullname`, `username`, `email`, `phone`, `password`) VALUES ('$fullname',
                    '$username','$email','$phone','$password');";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                echo "<script>alert('New User created.')</script>";
                $fullname = "";
                $username = "";
                $email = "";
                $phone = "";
                $_POST['password'] = "";
                $_POST['confpass'] = "";
                header("location: login.php");
            } else {
                echo "<script>alert('Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Email or User Name already exists.')</script>";
        }
    } else {
        echo "<script>alert('Password not matched.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register | ArtSapce</title>
    <link rel="shortcut icon" type="image" href="images/t2.png">

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Joan&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Joan', serif;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="d-none d-lg-block">
                        <img src="images/rg.jpg" alt="register">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-4">
                            <br>
                            <div class="text-center">
                                <h2 class="text-gray-900">Welcome To ArtSpace!</h2>
                                <h4 class="text-gray-900">Create Your Account!</h3>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $fullname; ?>" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $username; ?>" placeholder="User Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" value="<?php echo $email; ?>" placeholder="Mailing Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control form-control-user" id="exampleFirstName" value="<?php echo $phone; ?>" placeholder="Contact Number" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" value="<?php echo $_POST['password']; ?>" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confpass" class="form-control form-control-user" id="exampleRepeatPassword" value="<?php echo $_POST['confpass']; ?>" placeholder="Repeat Password" required>
                                    </div>
                                </div>

                                <input type="submit" name="submit" class="btn btn-dark btn-user btn-block" value="Create Account">

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>