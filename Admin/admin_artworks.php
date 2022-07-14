<?php
include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3><u>Artworks</u></h3>
        </div>
    </div>

    <div class="card-body shadow">
        <div class="">
            <h4><u>Session Message: </u></h4>
        </div>
        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo '<h4> ' . $_SESSION['success'] . ' </h4>';
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h4 class="bg-danger"> ' . $_SESSION['status'] . ' </h4>';
            unset($_SESSION['status']);
        }
        ?>
    </div>

    <br>

    <div class="card shadow mb-4 card-header py-3">
        <h4><u>Add New Artworks:</u></h4>
        <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group">
                    <label>Artwork Name</label>
                    <input type="text" name="artworkname" class="form-control" placeholder="Enter Artwork Name" required>
                </div>
                <div class="form-group">
                    <label>Artist's Name</label>
                    <input type="text" name="artistname" class="form-control" placeholder="Enter Artist's Name" required>
                </div>
                <div class="form-group">
                    <label>Medium</label>
                    <input type="text" name="medium" class="form-control" placeholder="Enter Medium" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter Description" required>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter price" required>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="choosefile" id="formFile" required>
                </div>
            </div>
            <div class="container">
                <input type="submit" name="add_artwork" value="Add New Art" class="btn btn-dark my-3">
            </div>
        </form>
    </div>

    <div class="card-body shadow">
        <h4><u>All Artworks:</u></h4>
        <div class="table-responsive">
            <?php
            $query = "SELECT * FROM `artworks`;";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {

            ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Artwork ID</th>
                            <th>Image</th>
                            <th>Artwork Name</th>
                            <th>Arttist's Name</th>
                            <th>Medium</th>
                            <th>Description</th>
                            <th>Estimated Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['art_id'] ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['art_img'] .'" alt="artworks" width="150px" height="120px">' ?> </td>
                                <td> <?php echo $row['art_name'] ?> </td>
                                <td> <?php echo $row['art_artist'] ?> </td>
                                <td> <?php echo $row['medium'] ?> </td>
                                <td> <?php echo $row['art_description'] ?> </td>
                                <td> <?php echo $row['price'] ?> </td>
                                <td>
                                    <form action="artwork_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['art_id'] ?>">
                                        <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="add_gallery.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['art_id'] ?>">
                                        <button type="submit" name="delete_artwork" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

            <?php
            } else {
                echo 'No Record Found!!!!!';
            }
            ?>
        </div>
    </div>

    <br>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>