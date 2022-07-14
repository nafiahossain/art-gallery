<?php

include 'connection.php';
include 'security.php';


if(isset($_POST['add_gallery']))
{
    $galleryname = $_POST['galleryname'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $openinghours = $_POST['openinghours'];
    $file = $_FILES['choosefile']['name'];

    $query = "INSERT INTO galleries (`g_name`, `description`, `address`, `open`, `g_image`) 
              VALUES ('$galleryname','$description','$address','$openinghours ','$file');";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        $_SESSION['success'] = "New Gallery Added To the Database!";
        header('Location: admin_gallery.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Add New Gallery To the Database!!";
        header('Location: admin_gallery.php');
    }

}

if(isset($_POST['edit_gallery']))
{
    $editid = $_POST['edit_id'];
    $editgalleryname = $_POST['galleryname'];
    $editdescription = $_POST['description'];
    $editaddress = $_POST['address'];
    $editopeninghours = $_POST['openinghours'];
    $editfile = $_FILES['choosefile']['name'];

    $query = "UPDATE `galleries` SET `g_name`='$editgalleryname',`description`='$editdescription',
    `address`='$editaddress',`open`='$editopeninghours',`g_image`='$editfile' WHERE `g_id`='$editid';";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        $_SESSION['success'] = "Gallery Information Updated To the Database!";
        header('Location: admin_gallery.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Update Gallery To the Database!!";
        header('Location: admin_gallery.php');
    }

}

if(isset($_POST['delete_gallery']))
{
    $dltid = $_POST['delete_id'];

    $query = "DELETE FROM `galleries` WHERE `g_id`='$dltid';";
    $res = mysqli_query($connect, $query);
    
    if($res)
    {
        $_SESSION['success'] = "Gallery Information Deleted From the Database!";
        header('Location: admin_gallery.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Delete Gallery Information From the Database!!";
        header('Location: admin_gallery.php');
    }
}

if(isset($_POST['add_show']))
{
    $showname = $_POST['showname'];
    $showtime = $_POST['showtime'];
    $address = $_POST['address'];
    $info = $_POST['info'];
    $file = $_FILES['choosefile']['name'];

    $query = "INSERT INTO shows (`s_name`, `time`, `place`, `info`, `image`) 
              VALUES ('$showname','$showtime','$address','$info','$file');";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        $_SESSION['success'] = "New Show Added To the Database!";
        header('Location: admin_shows.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Add New Show To the Database!!";
        header('Location: admin_shows.php');
    }

}

if(isset($_POST['edit_show']))
{
    $editid = $_POST['edit_id'];
    $editshowname = $_POST['showname'];
    $editshowtime = $_POST['showtime'];
    $editaddress = $_POST['address'];
    $editinfo = $_POST['info'];
    $editfile = $_FILES['choosefile']['name'];

    $query = "UPDATE `shows` SET `s_name`='$editshowname',`time`='$editshowtime',
    `place`='$editaddress',`info`='$editinfo',`image`='$editfile' WHERE `s_id`='$editid';";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        $_SESSION['success'] = "Show Information Updated To the Database!";
        header('Location: admin_shows.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Update Show To the Database!!";
        header('Location: admin_shows.php');
    }

}

if(isset($_POST['delete_show']))
{
    $dltid = $_POST['delete_id'];

    $query = "DELETE FROM `shows` WHERE `s_id`='$dltid';";
    $res = mysqli_query($connect, $query);
    
    if($res)
    {
        $_SESSION['success'] = "Show Information Deleted From the Database!";
        header('Location: admin_shows.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Delete Show Information From the Database!!";
        header('Location: admin_shows.php');
    }
}

if(isset($_POST['add_artist']))
{
    $artistname = $_POST['artistname'];
    $origin = $_POST['origin'];
    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $file = $_FILES['choosefile']['name'];
    $file1 = $_FILES['choosefile1']['name'];
    $file2 = $_FILES['choosefile2']['name'];
    $file3 = $_FILES['choosefile3']['name'];

    $query = "INSERT INTO `artists`(`ar_name`, `ar_origin`, `ar_bio`, `ar_email`, `ar_img`, 
              `img1`, `img2`, `img3`) VALUES ('$artistname','$origin','$bio','$email',
              '$file','$file1','$file2','$file3');";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        move_uploaded_file($_FILES['choosefile1']['tmp_name'], "upload/".$_FILES['choosefile1']['name']);
        move_uploaded_file($_FILES['choosefile2']['tmp_name'], "upload/".$_FILES['choosefile2']['name']);
        move_uploaded_file($_FILES['choosefile3']['tmp_name'], "upload/".$_FILES['choosefile3']['name']);
        $_SESSION['success'] = "New Artist Added To the Database!";
        header('Location: admin_artist.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Add New Artist To the Database!!";
        header('Location: admin_artist.php');
    }

}

if(isset($_POST['edit_artist']))
{
    $editid = $_POST['edit_id'];
    $editartistname = $_POST['artistname'];
    $editorigin = $_POST['origin'];
    $editbio = $_POST['bio'];
    $editemail = $_POST['email'];
    $editfile = $_FILES['choosefile']['name'];
    $editfile1 = $_FILES['choosefile1']['name'];
    $editfile2 = $_FILES['choosefile2']['name'];
    $editfile3 = $_FILES['choosefile3']['name'];

    $query = "UPDATE `artists` SET `ar_name`='$editartistname',`ar_origin`='$editorigin',
             `ar_bio`='$editbio',`ar_email`='$editemail',`ar_img`='$editfile',
             `img1`='$editfile1',`img2`='$editfile2',`img3`='$editfile3' WHERE `ar_id`='$editid';";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        move_uploaded_file($_FILES['choosefile1']['tmp_name'], "upload/".$_FILES['choosefile1']['name']);
        move_uploaded_file($_FILES['choosefile2']['tmp_name'], "upload/".$_FILES['choosefile2']['name']);
        move_uploaded_file($_FILES['choosefile3']['tmp_name'], "upload/".$_FILES['choosefile3']['name']);
        $_SESSION['success'] = "Artist Information Updated To the Database!";
        header('Location: admin_artist.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Update Artist Information To the Database!!";
        header('Location: admin_artist.php');
    }

}

if(isset($_POST['delete_artist']))
{
    $dltid = $_POST['delete_id'];

    $query = "DELETE FROM `artists` WHERE `ar_id`='$dltid';";
    $res = mysqli_query($connect, $query);
    
    if($res)
    {
        $_SESSION['success'] = "Artist Information Deleted From the Database!";
        header('Location: admin_artist.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Delete Artist Information From the Database!!";
        header('Location: admin_artist.php');
    }
}

if(isset($_POST['add_artwork']))
{
    $artworkname = $_POST['artworkname'];
    $artistname = $_POST['artistname'];
    $medium = $_POST['medium'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $file = $_FILES['choosefile']['name'];

    $query = "INSERT INTO `artworks`(`art_name`, `art_artist`, `medium`, `art_description`, `price`, `art_img`) 
              VALUES ('$artworkname','$artistname','$medium','$description','$price','$file');";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        $_SESSION['success'] = "New Artwork Added To the Database!";
        header('Location: admin_artworks.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Add New Artwork To the Database!!";
        header('Location: admin_artworks.php');
    }

}

if(isset($_POST['edit_artwork']))
{
    $editid = $_POST['edit_id'];
    $editartworkname = $_POST['artworkname'];
    $editartistname = $_POST['artistname'];
    $editmedium = $_POST['medium'];
    $editdescription = $_POST['description'];
    $editprice = $_POST['price'];
    $editfile = $_FILES['choosefile']['name'];

    $query = "UPDATE `artworks` SET `art_name`='$editartworkname',`art_artist`='$editartistname',`medium`='$editmedium',
             `art_description`='$editdescription',`price`='$editprice',`art_img`='$editfile' WHERE `art_id`='$editid';";
    $res = mysqli_query($connect, $query);

    if($res)
    {
        move_uploaded_file($_FILES['choosefile']['tmp_name'], "upload/".$_FILES['choosefile']['name']);
        $_SESSION['success'] = "Art Information Updated To the Database!";
        header('Location: admin_artworks.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Update Art Information To the Database!!";
        header('Location: admin_artworks.php');
    }

}

if(isset($_POST['delete_artwork']))
{
    $dltid = $_POST['delete_id'];

    $query = "DELETE FROM `artworks` WHERE `art_id`='$dltid';";
    $res = mysqli_query($connect, $query);
    
    if($res)
    {
        $_SESSION['success'] = "Art Information Deleted From the Database!";
        header('Location: admin_artworks.php');
    }
    else
    {
        $_SESSION['status'] = "Unable To Delete Art Information From the Database!!";
        header('Location: admin_artworks.php');
    }
}


?>