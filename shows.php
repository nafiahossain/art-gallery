<?php
include('admin/security.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibitions | ArtSpace</title>
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

        <a style="margin-left: 350px;" href="about.html">About</a>
        <a href="home.html">Home</a>

        <div class="topnav-right">
            <a href="contact.php">Contact</a>
            <a style="margin-right: 350px;" href="register.php">Join</a>
        </div>

    </div>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between container">
            <a class="p-2 text-muted" href="artists.php">Artists</a>
            <a class="p-2 text-muted" href="galleries.php">Galleries</a>
            <a class="p-2 text-muted" href="shows.php">Exhibitions</a>
            <a class="p-2 text-muted" href="artworks.php">Artworks</a>
            <a class="p-2 text-muted" href="reviews.php">Reviews</a>
            <a class="p-2 text-muted" href="myprofile.php">My Collections</a>
            <a class="p-2 text-muted" href="home_for_user.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are you sure you want to logout?');">Logout</a>
        </nav>
    </div>

    <hr>

    <div class="container">

        <div>
            <div class="row">
                <img alt="First" class="d-block w-100" src="images/sh.jpg">
            </div>
            <hr>
            <h1 class="animated zoomIn" style="text-align: center;">----- Visit Exhibitions -----</h1>
            <h5 class="animated zoomIn text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae obcaecati placeat et ipsa tempora quis, rerum sit excepturi quam minus ratione consequatur accusantium tenetur a fugiat repudiandae facere voluptate nihil!</h5>

            <hr>

            <div class="container py-5">
                <div class="row mt-4">
                    <?php
                    $query = "SELECT * FROM shows;";
                    $res = mysqli_query($connect, $query);
                    $res_check = mysqli_num_rows($res) > 0;

                    if ($res_check) {
                        while ($row = mysqli_fetch_array($res)) {
                    ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="admin/upload/<?php echo $row['image']; ?>" width="245px" height="230px" alt="shows">
                                    <div class="card-body text-center">
                                        <h3><?php echo $row['s_name']; ?></h3>
                                        <h6><?php echo $row['time']; ?></h6>
                                        <h4><?php echo $row['place']; ?></h4>
                                        <p><?php echo $row['info']; ?></p>
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