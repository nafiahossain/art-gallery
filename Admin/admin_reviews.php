<?php
include ('security.php');

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

    <div class="container d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><u>Reviews</u></h1>    
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
        <h4><u>All Reviews:</u></h4>
        <div class="table-responsive">
            <?php
            $query = "SELECT * FROM `reviews`;";
            $res = mysqli_query($connect, $query);

            if (mysqli_num_rows($res) > 0) {

            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Review ID</th>
                            <th>User ID</th>
                            <th>Title</th>
                            <th>Review</th>
                            <th>Category</th>
                            <th>Time Posted</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td> <?php echo $row['r_id'] ?> </td>
                                <td> <?php echo $row['user_id'] ?> </td>
                                <td> <?php echo $row['title'] ?> </td>
                                <td> <?php echo $row['review'] ?> </td>
                                <td> <?php echo $row['category'] ?> </td>
                                <td> <?php echo $row['time'] ?> </td>
                                <td> <?php echo '<img src="upload/' . $row['r_img'] . '" alt="review images" width="100px" height="125px">' ?> </td>
                                <td>
                                    <form action="add_gallery.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['r_id'] ?>">
                                        <button type="submit" name="delete_review" class="btn btn-danger">Delete</button>
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