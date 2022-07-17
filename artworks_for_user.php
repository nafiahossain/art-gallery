<?php
include('admin/security.php');

$user_id = $_SESSION['us_id'];

if(!isset($user_id)){
    header("location: login.php");
}

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header("location: login.php");
}

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

        /* artwork gallery Css grid  */
        .contt {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-gap: .3rem;
            grid-auto-rows: 150px, 350px;
        }

        .gallery-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .image {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 50% 50%;
            transition: .4s linear;
        }

        .image img:hover {
            transform: scale(1.4);
        }

        .text {
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            transition: .4s linear;
        }

        .gallery-container:hover .text {
            opacity: 1;
        }

        .contt div:nth-child(1) {
            grid-column: span 3;
        }

        .contt div:nth-child(2) {
            grid-column: span 3;
        }

        .contt div:nth-child(3) {
            grid-column: span 2;
        }

        .contt div:nth-child(4) {
            grid-column: span 2;
        }

        .contt div:nth-child(5) {
            grid-column: span 2;
        }

        .contt div:nth-child(6) {
            grid-column: span 3;
        }

        .contt div:nth-child(8) {
            grid-column: span 2;
        }

        .contt div:nth-child(9) {
            grid-column: span 3;
        }

        .contt div:nth-child(10) {
            grid-column: span 3;
        }
    </style>
</head>

<body>
    <?php
        $select_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `u_id`= '$user_id';") or die('query failed');

        if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
        }
    ?>
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

        <hr>

        <div class="contt">
            <?php
            $query = "SELECT * FROM `artworks`;";
            $res = mysqli_query($connect, $query);
            $res_check = mysqli_num_rows($res) > 0;


            if ($res_check) {
                while ($row = mysqli_fetch_array($res)) {
                    $_SESSION['art_id'] = $row['art_id'];
            ?>
                    <div class="gallery-container">
                        <div class="image">
                            <img src="admin/upload/<?php echo $row['art_img']; ?>" alt="artist">
                        </div>
                        <div class="text">
                            <h4>Ttile: <?php echo $row['art_name']; ?></h4>
                            <h5><i>by</i> <?php echo $row['art_artist']; ?></h5>
                            <p><i>medium: <?php echo $row['medium']; ?></i></p>
                            <a href="artwork_details.php?details_id=<?php echo $row['art_id'] ?>">
                                <button type="submit" name="details" class="btn btn-secondary">View details &raquo;</button>
                            </a>
                        </div>

                    </div>
            <?php
                }
            } else {
                echo 'No Shows Found!!!';
            }
            ?>
            <br>
        </div> <br> <br> <br>

        <hr class="featurette-divider">


    </div>

    <br> <br>


<!--footer-->
    <?php
    include('footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>