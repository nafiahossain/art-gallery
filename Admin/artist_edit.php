<?php

include('security.php');

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header("location: admin_login.php");
}

include('includes/header.php');
include('includes/navbar.php');

?>

<?php
    $select_admin = mysqli_query($connect, "SELECT * FROM `admin` WHERE `a_id`= '$admin_id';") or die('query failed');

    if(mysqli_num_rows($select_admin) > 0){
        $fetch_admin = mysqli_fetch_assoc($select_admin);
    }
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Edit Artist </h3>
        </div>
    </div>

    <div class="card shadow mb-4 card-header py-3">
        <h4><u>Update Artist:</u></h4>

        <?php
        if (isset($_POST['edit'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM `artists` WHERE ar_id='$id';";
            $res = mysqli_query($connect, $query);

            foreach ($res as $row) {
        ?>
                <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['ar_id'] ?>">
                    <div class="container">
                        <div class="form-group">
                            <label>Artist Name</label>
                            <input type="text" name="artistname" value="<?php echo $row['ar_name'] ?>" class="form-control" placeholder="Enter Artist Name" required>
                        </div>
                        <div class="form-group">
                            <label>Origin</label>
                            <input type="text" name="origin" value="<?php echo $row['ar_origin'] ?>" class="form-control" placeholder="Enter Origin" required>
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <input type="text" name="bio" value="<?php echo $row['ar_bio'] ?>" class="form-control" placeholder="Enter bio" required>
                        </div>
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" name="email" value="<?php echo $row['ar_email'] ?>" class="form-control" placeholder="Enter E-Mail" required>
                        </div>
                        <div class="form-group">
                            <label>Artist Image</label>
                            <input class="form-control" type="file" name="choosefile" value="<?php echo $row['ar_img'] ?>" id="formFile" required>
                        </div>
                        <div class="form-group">
                            <label>Artwork 1</label>
                            <input class="form-control" type="file" name="choosefile1" value="<?php echo $row['img1'] ?>" id="formFile" required>
                        </div>
                        <div class="form-group">
                            <label>Artwork 2</label>
                            <input class="form-control" type="file" name="choosefile2" value="<?php echo $row['img2'] ?>" id="formFile" required>
                        </div>
                        <div class="form-group">
                            <label>Artwork 3</label>
                            <input class="form-control" type="file" name="choosefile3" value="<?php echo $row['img3'] ?>" id="formFile" required>
                        </div>
                    </div>
                    <div class="container">
                        <a href="admin_artist.php" class="btn btn-danger">Cancel</a>
                        <input type="submit" name="edit_artist" value="Update" class="btn btn-dark my-3">
                    </div>
                </form>
                
        <?php
            }
        }
        ?>


    </div>
</div>

<?php

include('includes/scripts.php');
include('includes/footer.php');

?>