<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Edit Galleries </h3>
        </div>
    </div>

    <div class="card shadow mb-4 card-header py-3">
        <h4><u>Update Gallery:</u></h4>

        <?php
        if (isset($_POST['edit'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM galleries WHERE g_id='$id';";
            $res = mysqli_query($connect, $query);

            foreach ($res as $row) {
        ?>
                <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['g_id'] ?>">
                    <div class="container">
                        <div class="form-group">
                            <label>Gallery Name</label>
                            <input type="text" name="galleryname" value="<?php echo $row['g_name'] ?>" class="form-control" placeholder="Enter Gallery Name" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Description" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Enter Address" required>
                        </div>
                        <div class="form-group">
                            <label>Opening Hours</label>
                            <input type="text" name="openinghours" value="<?php echo $row['open'] ?>" class="form-control" placeholder="Enter Opening Hours" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="choosefile" value="<?php echo $row['g_image'] ?>" id="formFile" required>
                        </div>
                    </div>
                    <div class="container">
                        <a href="admin_gallery.php" class="btn btn-danger">Cancel</a>
                        <input type="submit" name="edit_gallery" value="Update" class="btn btn-dark my-3">
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