<?php
include ('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container-fluid">

    <div class="container d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><u>Artists</u></h1>    
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
        <h4><u>Add New Artist:</u></h4>
        <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="form-group">
                    <label>Artist Name</label>
                    <input type="text" name="artistname" class="form-control" placeholder="Enter Artist Name" required>
                </div>
                <div class="form-group">
                    <label>Origin</label>
                    <input type="text" name="origin" class="form-control" placeholder="Enter Origin" required>
                </div>
                <div class="form-group">
                    <label>Bio</label>
                    <input type="text" name="bio" class="form-control" placeholder="Enter Bio" required>
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label>Artist Image</label>
                    <input class="form-control" type="file" name="choosefile" id="formFile" required>
                </div>
                <div class="form-group">
                    <label>Artist Artwork 1</label>
                    <input class="form-control" type="file" name="choosefile1" id="formFile" required>
                </div>
                <div class="form-group">
                    <label>Artist Artwork 2</label>
                    <input class="form-control" type="file" name="choosefile2" id="formFile" required>
                </div>
                <div class="form-group">
                    <label>Artist Artwork 3</label>
                    <input class="form-control" type="file" name="choosefile3" id="formFile" required>
                </div>
            </div>
            <div class="container">
                <input type="submit" name="add_artist" value="Add New Artist" class="btn btn-dark my-3">
            </div>
        </form>
    </div>

    <div class="card-body shadow">
        <h4><u>All Artists:</u></h4>
        <div class="table-responsive">
            <?php
            $query = "SELECT * FROM `artists`;";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {

            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Artist ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Origin</th>
                            <th>Bio</th>
                            <th>E-mail</th>
                            <th>Artwork 1</th>
                            <th>Artwork 2</th>
                            <th>Artwork 3</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['ar_id'] ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['ar_img'] . '" alt="gallery images" width="115px" height="130px">' ?> </td>
                                <td> <?php echo $row['ar_name'] ?> </td>
                                <td> <?php echo $row['ar_origin'] ?> </td>
                                <td> <?php echo $row['ar_bio'] ?> </td>
                                <td> <?php echo $row['ar_email'] ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['img1'] . '" alt="gallery images" width="100px" height="110px">' ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['img2'] . '" alt="gallery images" width="100px" height="110px">' ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['img3'] . '" alt="gallery images" width="100px" height="110px">' ?> </td>
                                <td>
                                    <form action="artist_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['ar_id'] ?>">
                                        <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="add_gallery.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['ar_id'] ?>">
                                        <button type="submit" name="delete_artist" class="btn btn-danger">Delete</button>
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

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>