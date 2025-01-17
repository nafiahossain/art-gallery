<?php
include('admin/security.php');

$user_id = $_SESSION['us_id'];

$art_id = $_SESSION['art_id'];

if(!isset($user_id)){
    header("location: login.php");
}

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header("location: login.php");
}

if(isset($_POST['add_to_fave'])){

    $art = $_POST['art'];
    $artist = $_POST['artist'];
    $art_medium = $_POST['art_medium'];
    $art_price = $_POST['art_price'];
    $art_img = $_POST['art_img'];

    $select_fave = mysqli_query($connect, "SELECT * FROM `fave` WHERE
                 `f_name` = '$art' AND `user_id` = '$user_id';" ) or die('query failed');
    
    if(mysqli_num_rows($select_fave) > 0){
        echo "<script>alert('This Artwork is Already Added To Your Collection!')</script>";
    }
    else {
        mysqli_query($connect, "INSERT INTO `fave`(`user_id`, `f_name`, `f_aname`,
       `f_medium`, `f_price`, `f_img`) VALUES ('$user_id','$art','$artist',
       '$art_medium','$art_price','$art_img')") or die('query failed');
        echo "<script>alert('Artwork Added To Your Collection!')</script>";
        
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artworks | ArtSpace</title>
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
    if(isset($message)){
        foreach($message as $message){
            echo '<div class = "message" onclick = "this.remove();">' .$message. '</div>';
        }
    }
    ?>

    <?php
        $select_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `u_id`= '$user_id';") or die('query failed');

        if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
        }
    ?>

    <?php
        $select_art = mysqli_query($connect, "SELECT * FROM `artworks` WHERE `art_id`= '$art_id';") or die('query failed');

        if(mysqli_num_rows($select_art) > 0){
            $fetch_art = mysqli_fetch_assoc($select_art);
        }
    ?>

    <div class="topnav box-shadow">

        <!-- Centered link -->
        <div class="topnav-centered">
            <img class="logo" src="images/logoo.png" alt="ArtSpace">
        </div>

        <a style="margin-left: 350px;" href="about.html">About</a>
        <a href="home_for_user.php">Home</a>

        <div class="topnav-right">
            <a href="contact.php">Contact</a>
            <a style="margin-right: 350px;" href="myprofile.php">My Profile</a>
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

            $query = "SELECT * FROM `artworks` WHERE art_id='$id';";
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
                <img src="admin/upload/<?php echo $row['art_img']; ?>" alt="artwork">
            </div>
        </div>
        
        <hr>
        <h3 style="text-align: center;"><?php echo $row['art_name'] ?></h3>
        <h4 style="text-align: center;"><i>by</i> <?php echo $row['art_artist'] ?></h4>
        <h4 style="text-align: center;"><i>medium: <?php echo $row['medium'] ?></i></h4>
        <hr>
        <h3 style="text-align: center;"><i>about the art</i></h3>
        <h5 style="text-align: center;"><?php echo $row['art_description'] ?></h5> <br>
        <h6 style="text-align: center;"><i><b>estimated price: </b> <?php echo $row['price'] ?></i></h6>

        <form action="" method="post">
            <input type="hidden" name="art" value="<?php echo $row['art_name'] ?>">
            <input type="hidden" name="artist" value="<?php echo $row['art_artist'] ?>">
            <input type="hidden" name="art_medium" value="<?php echo $row['medium'] ?>">
            <input type="hidden" name="art_price" value="<?php echo $row['price'] ?>">
            <input type="hidden" name="art_img" value="<?php echo $row['art_img']; ?>">

            <h2 class="text-center">Hello <?php echo $fetch_user['fullname']; ?>!</h2>
        
            <input type="submit" class="container btn btn-secondary" name="add_to_fave" value="Add to Your Collection">
        </form>
        
        <br> <br>
                

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