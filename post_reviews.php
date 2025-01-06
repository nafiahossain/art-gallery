<?php
include('admin/security.php');
error_reporting(0);

$user_id = $_SESSION['us_id'];

if(!isset($user_id)){
    header("location: login.php");
}

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header("location: login.php");
}

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $stitle = str_replace("'", "\'", $title);
    $review = $_POST['review'];
    $category = $_POST['category'];
    $files = $_FILES['choose']['name'];

    $query = "INSERT INTO `reviews`(`user_id`, `title`, `review`, `category`, `r_img`) VALUES 
          ('$user_id',' $stitle','$review','$category','$files');";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choose']['tmp_name'], "admin/upload/".$_FILES['choose']['name']);
        echo "<script>alert('Review Posted.')</script>";

    }
    else
    {
        echo "<script>alert('Something went wrong.')</script>";
 
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Reviews | ArtSpace</title>
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

    <div class="container">
    
        <div class="col-lg-11 mx-auto">
            <div class="card o-hidden border-1  my-5">
                <div class="card-body p-0">
                    <div class="p-4">
                        <br>
                        <div class="text-center">
                            <img src="images/rev.jpg" alt=""> <br>
                            <br>
                            <h2 class="text-gray-900">Write your reviews about ArtSpace!</h2>
                            <h5 class="text-gray-900">Share your experience with ArtSpace, their artists, artwork 
                                collections, Exhibitions and galleries! Try to keep your reviews relevant and respect our 
                                artists their artworks and our employees. Don't forget to Be Kind!</h5>
                        <hr>
                        <br>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label><b> Title of Your Review:</b></label>
                                <input type="text" name="title" class="form-control" value="" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label><b>Write Your Review:</b></label>
                                <textarea name="review" class="form-control" cols="30" rows="10" placeholder="Review Goes Here!" required></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label><b>Category:</b> </label>
                                    <select name="category" class="form-control">
                                        <option value="">--Select--</option>
                                        <option value="Artist">Artist</option>
                                        <option value="Artwork">Artwork</option>
                                        <option value="Gallery">Gallery</option>
                                        <option value="Exhibition">Exhibition</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><b>Include a Relevant Image:</b></label>
                                <input class="form-control" type="file" name="choose" id="formFile" required>
                            </div>

                            <input type="submit" name="submit" class="btn btn-dark btn-user btn-block" value="Post Review">

                        </form>
                        <br>
                        <hr>
                        <br>
                        <div class="text-center">
                            <img src="images/rev2.jpg" width="890px" height="250px" alt=""> <br>
                            <br>
                            <a class="medium" href="reviews.php">Discover more Reviews!</a>
                        </div>
                    </div>
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