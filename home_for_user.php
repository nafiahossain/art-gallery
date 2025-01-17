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
    <title>Home | ArtSpace</title>
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
            margin-bottom: 0;
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

        .card-img-right {
            height: 100%;
            border-radius: 0 3px 3px 0;
        }

        .flex-auto {
            -ms-flex: 0 0 auto;
            -webkit-box-flex: 0;
            flex: 0 0 auto;
        }

        .h-250 {
            height: 250px;
        }

        @media (min-width: 768px) {
            .h-md-250 {
                height: 250px;
            }
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

        /*
   * Blog name and description
   */
        .blog-title {
            margin-bottom: 0;
            font-size: 2rem;
            font-weight: 400;
        }

        .blog-description {
            font-size: 1.1rem;
            color: #999;
        }

        @media (min-width: 40em) {
            .blog-title {
                font-size: 3.5rem;
            }
        }

        /* Pagination */
        .blog-pagination {
            margin-bottom: 4rem;
        }

        .blog-pagination>.btn {
            border-radius: 2rem;
        }

        /*
   * Blog posts
   */
        .blog-post {
            margin-bottom: 4rem;
        }

        .blog-post-title {
            margin-bottom: .25rem;
            font-size: 2.5rem;
        }

        .blog-post-meta {
            margin-bottom: 1.25rem;
            color: #999;
        }

        /* Carousel base class */
        .carousel {
            margin-bottom: 4rem;
        }

        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
            height: 32rem;
            background-color: #777;
        }

        .carousel-item>img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
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
        <a href="navboot.html">Landing</a>

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


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="images/home1.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Welcome!</h1>
                        <p class="lead">We believe that art is an inseparable part of life, as well as a universal language that
                            bridges cultures and fosters human connections. ArtSpace is a global network of high-end contemporary art galleries
                            that endeavors to embody and promote contemporary optimism through a mix of passion and bravery.</p>
                        <p><a class="btn btn-md btn-secondary" href="artists_for_user.php" role="button">Explore More!</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="images/home3.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption text-dark">
                        <h1>Get Inspired!</h1>
                        <p class="lead"> ArtSpace is proud to present vibrant works of art from our renowned contemporary artists
                            and their collections.
                            Works by artists getting increasing attention from our collectors via searches, page views, bids,
                            and inquiries. Discover works
                            fresh from the studios of up-and-coming artists with recent shows at tastemaking galleries and
                            booths at top fairs.</p>
                        <p><a class="btn btn-md btn-secondary" href="artworks.php" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="images/hm6.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>Discover Galleries Around!</h1>
                        <p class="lead"> We curate a diverse array of exhibitions and artworks by internationally renowned contemporary artists who 
                            have been handpicked for their creativity, color and innovation. We believe that art is an inseparable part of life, as well as a universal language that
                            bridges cultures and fosters human connections.</p>
                        <p><a class="btn btn-md btn-secondary" href="galleries.php" role="button">Browse Gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container marketing">

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">About Us</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Our Purpose</a>
                        </h3>
                        <div class="mb-1 text-muted">Jul 12</div>
                        <p class="card-text mb-auto">The main purpose of this community is to spread art and creating a
                            safer
                            environment for artists all over the world.</p>
                        <a href="about.html">Read More...</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" src="images/card1.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">Reviews</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Post Your Reviews</a>
                        </h3>
                        <div class="mb-1 text-muted">Jul 12</div>
                        <p class="card-text mb-auto">ArtSpace gives you an access to post reviews about our artists, artworks,
                            galleries, and shows. Join today! Be kind and tell us your opinion!
                        </p>
                        <a href="reviews.php">Read More...</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" src="images/shows.jpg" alt="Card image cap">
                </div>
            </div>
        </div>

        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-11 px-0 mx-auto">
                <img src="images/third.jpg" alt="">
                <h1 class="display-4 font-italic text-center">Explore the world of art with us!</h1>
                <p class="lead text-center">We believe that art is an inseparable part of life, as well as a universal language that
                    bridges cultures and fosters human connections. ArtSpace is a global network of high-end contemporary art galleries
                    that endeavors to embody and promote contemporary optimism through a mix of passion and bravery.</p>
                <p class="lead mb-0 text-center"><a href="" class="text-white font-weight-bold">Welcome!</a></p>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <strong class="d-inline-block mb-2 text-primary">Galleries</strong>
                <h2 class="featurette-heading">A Global Network of Contemporary Art Galleries, <span
                        class="text-muted">It'll blow your
                        mind.</span></h2>
                <p class="lead">We believe that art is an inseparable part of life, as well as a universal language that
                    bridges cultures
                    and fosters human connections. ArtSpace is a global network of high-end contemporary art galleries
                    that endeavors to
                    embody and promote contemporary optimism through a mix of passion and bravery. We curate a diverse
                    array of exhibitions
                    and artworks by internationally renowned contemporary artists who have been handpicked for their
                    creativity, color and innovation.</p>
                <p><a class="btn btn-secondary" href="galleries.php" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="images/gallery.jpg"
                    alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <strong class="d-inline-block mb-2 text-primary">Our Artists</strong>
                <h2 class="featurette-heading">Explore the original works and collections of,
                    <span class="text-muted">ArtSpace's in-house fine artists.</span>
                </h2>
                <p class="lead">ArtSpace is proud to present vibrant works of art from our renowned contemporary artists
                    and their collections.
                    Works by artists getting increasing attention from our collectors via searches, page views, bids,
                    and inquiries. Discover works
                    fresh from the studios of up-and-coming artists with recent shows at tastemaking galleries and
                    booths at top fairs. Historically
                    underrepresented and undervalued, women artists have always made work that is innovative,
                    impressive, and thought-provoking. Today,
                    many institutions are giving due recognition to this fact. Below, find a selection of highlights
                    from new and noteworthy female-identifying
                    artists, hand-picked by ArtSpace's Curatorial team.
                </p>
                <p><a class="btn btn-secondary" href="artists_for_user.php" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="images/artist.jpg" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <strong class="d-inline-block mb-2 text-primary">Discover Museums</strong>
                <h2 class="featurette-heading">Get Inspired, <span class="text-muted">Everyday.</span></h2>
                <p class="lead">A museum is a building or institution that cares for and displays a collection of
                    artifacts
                    and other objects of artistic, cultural, historical, or scientific importance. Many public museums
                    make
                    these items available for public viewing through exhibits that may be permanent or temporary. The
                    largest museums
                    are located in major cities throughout the world, while thousands of local museums exist in smaller
                    cities,
                    towns, and rural areas. Museums have varying aims, ranging from the conservation and documentation
                    of their collection,
                    serving researchers and specialists, to catering to the general public. The goal of serving
                    researchers is not only
                    scientific, but intended to serve the general public.</p>
                <p><a class="btn btn-secondary" href="artworks_for_user.php" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="images/Museum.png" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <strong class="d-inline-block mb-2 text-primary">Exhibition</strong>
                <h2 class="featurette-heading">Visit Exhibitions, <span class="text-muted">Around you.</span></h2>
                <p class="lead">As with most topics in the art world, the meaning of an art exhibition is subjective. To
                    a member of
                    the public with vague artistic interests, an art exhibition might make the list of places to visit
                    on a rainy day.
                    Alternatively, to an artist, an exhibition could be the defining point of their career. Typically,
                    an art exhibition
                    is understood to be a place or area in which 'art' is presented by an artist or group of artists to
                    be viewed by an
                    audience. Galleries and museums in almost every city across the world are among the most typical
                    locations that an
                    exhibition can be found. Since every culture, country, and community has a unique history of art,
                    exhibitions displaying
                    modern and traditional art can be found everywhere, in even the most remote locations. </p>
                <p><a class="btn btn-secondary" href="shows.php" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="images/shows.jpg" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/r1.jpg" alt="Generic placeholder image" width="140"
                    height="140">
                <h2>Artist's Review</h2>
                <p class="text-muted">John Doe</p>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh
                    ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                    Praesent commodo cursus magna.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/r2.jpg" alt="Generic placeholder image" width="140"
                    height="140">
                <h2>User's Review</h2>
                <p class="text-muted">Joyce</p>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                    Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo,
                    tortor mauris condimentum nibh.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/r3.jpg" alt="Generic placeholder image" width="140"
                    height="140">
                <h2>Artist's Review</h2>
                <p class="text-muted">Alexis</p>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id
                    ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                    condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <hr>

    </div>

    <div class="container p-2 border text-center box-shadow">
            <?php 
            if (isset($_COOKIE['username'])) {
                echo "<h4>Welcome " . $_COOKIE['username'] . "! This website uses Cookies.</h4>";
            } else {
                echo "'Unable To set cookie.'";
            }
            ?>
    </div>

    <hr class="container">


    <!--footer-->
    <?php
        include('footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>