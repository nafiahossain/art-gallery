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
            <h3>Edit Admins </h3>
        </div>
    </div>

    <div class="card shadow mb-4 card-header py-3">
        <h4><u>Update Admin:</u></h4>

        <?php
        if (isset($_POST['edit'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM `admin` WHERE a_id='$id';";
            $res = mysqli_query($connect, $query);

            foreach ($res as $row) {
        ?>
                <form action="add_gallery.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['a_id'] ?>">
                    <div class="container">
                        <div class="form-group">
                            <label>Admin Name</label>
                            <input type="text" name="adminname" value="<?php echo $row['a_name'] ?>" class="form-control" placeholder="Enter admin Name" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Enter phone" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="container">
                        <a href="admin.php" class="btn btn-danger">Cancel</a>
                        <input type="submit" name="edit_admin" value="Update" class="btn btn-dark my-3">
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