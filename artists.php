<?php
include('admin/security.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleries | ArtSpace</title>
    <link rel="shortcut icon" type="image" href="images/t2.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Joan', serif;
        }

        .topnav {
            position: sticky;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
            background-color: white;
        }

        .topnav a {
            float: left;
            color: black;
            text-align: center;
            margin: 25px 20px;
            padding: 10px 10px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
        }

        .topnav a:hover {
            background-color: #E9D5DA;
            color: black;
        }

        .topnav a.active {
            color: white;
        }

        .topnav-centered img {
            float: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .topnav-right {
            float: right;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

        .nav-scroller {
            position: static;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .nav-scroller .nav-link {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: .875rem;
        }

        /* Featurettes
------------------------- */

        .featurette-divider {
            margin: 5rem 0;
            /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            letter-spacing: -.05rem;
        }

        /* MARKETING CONTENT
-------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .marketing h2 {
            font-weight: 400;
        }

        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        .card {
            outline: .1rem;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body>
    <div class="topnav box-shadow">

        <!-- Centered link -->
        <div class="topnav-centered">
            <img class="logo" src="images/logoo.png" alt="ArtSpace">
        </div>

        <!-- Left-aligned links (default) -->
        <a style="margin-left: 350px;" href="#news">News</a>
        <a href="#contact">Contact</a>

        <!-- Right-aligned links -->
        <div class="topnav-right">
            <a href="#search">Search</a>
            <a style="margin-right: 350px;" href="#about">About</a>
        </div>

    </div>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between container">
            <a class="p-2 text-muted" href="#">Artists</a>
            <a class="p-2 text-muted" href="#">Galleries</a>
            <a class="p-2 text-muted" href="#">Exhibitions</a>
            <a class="p-2 text-muted" href="#">Museums</a>
            <a class="p-2 text-muted" href="#">Culture</a>
            <a class="p-2 text-muted" href="#">blogs</a>
            <a class="p-2 text-muted" href="#">Search</a>
        </nav>
    </div>

    <hr>

    <div class="container">

        <div>
            <img alt="First slide" class="d-block w-100" src="images/1.jpg">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="animated zoomIn" style="animation-delay: .5s">Welcome to the <br>ArtSpace Community!</h5>
                <p class="animated fadeInLeft" style="animation-delay: 1s">Discover the world of art, Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                <p class="animated zoomIn" style="animation-delay: 1s"><a href="#">More Info</a></p>
            </div>
        </div>
        <hr>
        <h1 style="text-align: center;">----- Our Beloved Artists -----</h1>

        <hr >

        <div class="container py-5">
            <div class="row mt-4">
                <?php
                $query = "SELECT * FROM `artists`;";
                $res = mysqli_query($connect, $query);
                $res_check = mysqli_num_rows($res) > 0;

                if ($res_check) {
                    while ($row = mysqli_fetch_array($res)) {
                ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="admin/upload/<?php echo $row['ar_img']; ?>" width="px" height="400px" alt="artist">
                                <div class="card-body text-center">
                                    <h3><?php echo $row['ar_name']; ?></h3>
                                    <h6><?php echo $row['ar_bio']; ?></h6>
                                </div>
                            </div> <br> <br>
                        </div>


                <?php
                    }
                } else {
                    echo 'No Shows Found!!!';
                }
                ?>
            </div>
        

            <hr class="featurette-divider">
        </div>

    </div>

    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
                    <i class="fab fa-twitter"> </i>
                </a>

                <!-- Google -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
                    <i class="fab fa-google"></i>
                </a>
                <!-- Instagram -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
                    <i class="fab fa-instagram"></i>
                </a>
                <!-- Github -->
                <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">
                    <i class="fab fa-github"></i>
                </a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2); font-size: 17px; font-weight: 500;">
            © 2022 Copyright:
            <a class="text-dark" href="http://github.com/nafiahossain">Nafia Hossain</a>
            <p class="float-right"><a href="#">Back to top</a></p>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>