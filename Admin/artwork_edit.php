<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Edit Artwork </h3>
        </div>
    </div>

    <div class="card shadow mb-4 card-header py-3">
        <h4><u>Update Artwork:</u></h4>

        <?php
        if (isset($_POST['edit'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM `artworks` WHERE art_id='$id';";
            $res = mysqli_query($connect, $query);

            foreach ($res as $row) {
        ?>
                <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['art_id'] ?>">
                    <div class="container">
                        <div class="form-group">
                            <label>Artwork Name</label>
                            <input type="text" name="artworkname" value="<?php echo $row['art_name'] ?>" class="form-control" placeholder="Enter artwork name" required>
                        </div>
                        <div class="form-group">
                            <label>Artist's Name</label>
                            <input type="text" name="artistname" value="<?php echo $row['art_artist'] ?>" class="form-control" placeholder="Enter artist name" required>
                        </div>
                        <div class="form-group">
                            <label>Medium</label>
                            <input type="text" name="medium" value="<?php echo $row['medium'] ?>" class="form-control" placeholder="Enter medium" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="<?php echo $row['art_description'] ?>" class="form-control" placeholder="Enter Description" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control" placeholder="Enter Price" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="choosefile" value="<?php echo $row['art_img'] ?>" id="formFile" required>
                        </div>
                    </div>
                    <div class="container">
                        <a href="admin_artworks.php" class="btn btn-danger">Cancel</a>
                        <input type="submit" name="edit_artwork" value="Update" class="btn btn-dark my-3">
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