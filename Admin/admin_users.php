<?php
include ('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3><u>Users</u> </h3>
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

    <div class="card-body shadow">
        <h4><u>All Users:</u></h4>
        <div class="table-responsive">
            <?php
            $query = "SELECT * FROM `users`;";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {

            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['u_id'] ?> </td>
                                <td> <?php echo $row['fullname'] ?> </td>
                                <td> <?php echo $row['username'] ?> </td>
                                <td> <?php echo $row['email'] ?> </td>
                                <td> <?php echo $row['phone'] ?> </td>
                                <td> <?php echo $row['password'] ?> </td>
                                <td>
                                    <form action="add_gallery.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['u_id'] ?>">
                                        <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
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