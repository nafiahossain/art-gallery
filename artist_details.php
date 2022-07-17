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

        img {
            cursor: pointer;
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
            <a class="p-2 text-muted" href="artists_for_user.php">Artists</a>
            <a class="p-2 text-muted" href="galleries.php">Galleries</a>
            <a class="p-2 text-muted" href="shows.php">Exhibitions</a>
            <a class="p-2 text-muted" href="artworks_for_user.php">Artworks</a>
            <a class="p-2 text-muted" href="reviews.php">Reviews</a>
            <a class="p-2 text-muted" href="myprofile.php">My Collections</a>
            <a class="p-2 text-muted" href="home_for_user.php?logout=<?php echo $user_id; ?>" 
                onclick="return confirm('are you sure you want to logout?');">Logout</a>
        </nav>
    </div>

    <hr>

    <?php
        if (isset($_GET['details_id'])) {
            $id = $_GET['details_id'];

            $query = "SELECT * FROM `artists` WHERE ar_id='$id';";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {
        ?>

    <div class="container">

    
        <?php
            while ($row = mysqli_fetch_assoc($res)) {
        ?>

        <div>
            <div class="text-center">
                <br>
                <br>
                <img class="rounded-circle" src="admin/upload/<?php echo $row['ar_img']; ?>" alt="artist image" width="300" height="300">
            </div>
        </div>

        <hr>
        <h3 style="text-align: center;"><?php echo $row['ar_name'] ?></h3>
        <h4 style="text-align: center;"><i>Origin: <?php echo $row['ar_origin'] ?></i></h4>
        <hr>

        <h3 style="text-align: center;">About Our Artist</h3>
        <h4 style="text-align: center;"><i><?php echo $row['ar_bio'] ?></i></h4>
        <hr>

        <div class="container py-5">
            <h3 style="text-align: center;">Artist's Best Work</h3>
            <div class="row mt-4">
                    <div class="card col-lg-4">
                        <img src="admin/upload/<?php echo $row['img1']; ?>" width="px" height="400px" alt="artist">
                            <div class="card-body text-center">
                                <h3> <i>artwork 1</i></h3>
                            </div>
                    </div> <br> <br>
                    <div class="card col-lg-4">
                        <img src="admin/upload/<?php echo $row['img2']; ?>" width="px" height="400px" alt="artist">
                            <div class="card-body text-center">
                                <h3> <i>artwork 2</i></h3>
                            </div>
                    </div> <br> <br>
                    <div class="card col-lg-4">
                        <img src="admin/upload/<?php echo $row['img3']; ?>" width="px" height="400px" alt="artist">
                            <div class="card-body text-center">
                                <h3> <i>artwork 3</i></h3>
                            </div>
                    </div> <br> <br>
                

                <?php
                    }
                } else {
                    echo 'No Artwork Found!!!';
                }
            }
                ?>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php
    include('footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>