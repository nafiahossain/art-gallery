<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');

include('connection.php');
?>


<div class="container-fluid">

    <div class="container d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><u>Galleries</u></h1>    
    </div>

    <div class="card-body shadow">
        <div class="">
            <h4> <u>Session Message: </u> </h4>
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
        <h4><u>Add New Gallery:</u></h4>
        <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group">
                    <label>Gallery Name</label>
                    <input type="text" name="galleryname" class="form-control" placeholder="Enter Gallery Name" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter Description" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                    <label>Opening Hours</label>
                    <input type="text" name="openinghours" class="form-control" placeholder="Enter Opening Hours" required>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="choosefile" id="formFile" required>
                </div>
            </div>
            <div class="container">
                <input type="submit" name="add_gallery" value="Add New Gallery" class="btn btn-dark my-3">
            </div>
        </form>
    </div>

    <div class="card-body shadow">
        <h4><u>All Galleries:</u></h4>
        <div class="table-responsive">
            <?php
            $query = "SELECT * FROM galleries;";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {

            ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gallery ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Opening-Hours</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['g_id'] ?> </td>
                                <td> <?php echo $row['g_name'] ?> </td>
                                <td> <?php echo $row['description'] ?> </td>
                                <td> <?php echo $row['address'] ?> </td>
                                <td> <?php echo $row['open'] ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['g_image'] . '" alt="gallery images" width="100px" height="125px">' ?> </td>
                                <td>
                                    <form action="gallery_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['g_id'] ?>">
                                        <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="add_gallery.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['g_id'] ?>">
                                        <button type="submit" name="delete_gallery" class="btn btn-danger">Delete</button>
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