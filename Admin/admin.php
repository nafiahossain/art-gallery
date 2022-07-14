<?php
include ('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3><u>Admins</u> </h3>
        </div>
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
        <h4><u>Add New Admin:</u></h4>
        <form action="add_gallery.php" method="POST">
            <div class="container">
                <div class="form-group">
                    <label>Admin Name</label>
                    <input type="text" name="adminname" class="form-control" placeholder="Enter Admin Name" required>
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
            </div>
            <div class="container">
                <input type="submit" name="add_admin" value="Add New Admin" class="btn btn-dark my-3">
            </div>
        </form>
    </div>

    <div class="card-body shadow">
        <h4><u>All Admins:</u></h4>
        <div class="table-responsive">
            <?php
            $query = "SELECT * FROM `admin`;";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {

            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Admin ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['a_id'] ?> </td>
                                <td> <?php echo $row['a_name'] ?> </td>
                                <td> <?php echo $row['email'] ?> </td>
                                <td> <?php echo $row['phone'] ?> </td>
                                <td> <?php echo $row['password'] ?> </td>
                                <td>
                                    <form action="admin_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['a_id'] ?>">
                                        <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="add_gallery.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['a_id'] ?>">
                                        <button type="submit" name="delete_admin" class="btn btn-danger">Delete</button>
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