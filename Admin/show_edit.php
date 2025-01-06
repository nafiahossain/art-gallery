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
            <h3>Edit Shows </h3>
        </div>
    </div>

    <div class="card shadow mb-4 card-header py-3">
        <h4><u>Update Show:</u></h4>

        <?php
        if (isset($_POST['edit'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM shows WHERE s_id='$id';";
            $res = mysqli_query($connect, $query);

            foreach ($res as $row) {
        ?>
                <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['s_id'] ?>">
                    <div class="container">
                        <div class="form-group">
                            <label>Show Name</label>
                            <input type="text" name="showname" value="<?php echo $row['s_name'] ?>" class="form-control" placeholder="Enter Show Name" required>
                        </div>
                        <div class="form-group">
                            <label>Show Time</label>
                            <input type="text" name="showtime" value="<?php echo $row['time'] ?>" class="form-control" placeholder="Enter Show Time" required>
                        </div>
                        <div class="form-group">
                            <label>Presented By</label>
                            <input type="text" name="address" value="<?php echo $row['place'] ?>" class="form-control" placeholder="Enter Gallery Name" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="info" value="<?php echo $row['info'] ?>" class="form-control" placeholder="Enter Description" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="choosefile" value="<?php echo $row['image'] ?>" id="formFile" required>
                        </div>
                    </div>
                    <div class="container">
                        <a href="admin_shows.php" class="btn btn-danger">Cancel</a>
                        <input type="submit" name="edit_show" value="Update" class="btn btn-dark my-3">
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