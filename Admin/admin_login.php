<?php

include('security.php');
error_reporting(0);

if (isset($_POST["submit"]))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password';";
    $result = mysqli_query($connect, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['a_id'];
        header("location: index.php");
    }
    else
    {
        echo "<script>alert('Email or password is wrong.')</script>";
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

    <title>Admin Login</title>
    <link rel="shortcut icon" type="image" href="img/t2.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Joan&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Joan', serif;
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/lg.jpg" alt="">
                            </div>
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4">Hello Admin, Welcome Back!</h1>
                                    </div>
                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="<?php echo $_POST['password']; ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password" required>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-dark btn-user btn-block" value="Login">

                                    </form>
                                    <hr>
                                    <br>
                                    <div class="text-center">
                                        <a class="small" href="admin_register.php">Create an Account!</a>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>