<?php
include ('security.php');

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header("location: admin_login.php");
}

if(isset($_GET['logout'])){
    unset($admin_id);
    session_destroy();
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <span>
                    <a href="index.php?logout=<?php echo $admin_id;?>" 
                        onclick="return confirm('are you sure you want to logout?');"
                        class="btn btn-dark my-3">Logout</a>
                </span>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Hello <?php echo $fetch_admin['a_name']; ?>!</h6>
                    </div>
                    <div class="card-body">
                        <p>Welcome to ArtSpace Admin Panel. ArtSpace envisions a future where everyone is moved by art every day. 
                            To get there, we're expanding the art market to support more artists and art around the world. 
                            That's why we're dedicated to making a joyful, welcoming experience that connects collectors with 
                            the artists and artworks they love.</p>
                        <p class="mb-0">Thanks for being a part of this community to help Art lovers all over the
                            world to get connected with Art.</p>
                    </div>
                </div>

            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Admins</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        
                                        <?php
                                        $query = "SELECT `a_id` FROM `admin` ORDER BY `a_id`;";
                                        $res = mysqli_query($connect, $query);

                                        $row = mysqli_num_rows($res);
                                        echo '<h2>' .$row. '</h2>';
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Artists</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                        <?php
                                        $query = "SELECT `ar_id` FROM `artists` ORDER BY `ar_id`;";
                                        $res = mysqli_query($connect, $query);

                                        $row = mysqli_num_rows($res);
                                        echo '<h2>' .$row. '</h2>';
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Galleries
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                <?php
                                                $query = "SELECT `g_id` FROM `galleries` ORDER BY `g_id`;";
                                                $res = mysqli_query($connect, $query);

                                                $row = mysqli_num_rows($res);
                                                echo '<h2>' .$row. '</h2>';
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Exhibitions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                        <?php
                                        $query = "SELECT `s_id` FROM `shows` ORDER BY `s_id`;";
                                        $res = mysqli_query($connect, $query);

                                        $row = mysqli_num_rows($res);
                                        echo '<h2>' .$row. '</h2>';
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $query = "SELECT `u_id` FROM `users` ORDER BY `u_id`;";
                                        $res = mysqli_query($connect, $query);

                                        $row = mysqli_num_rows($res);
                                        echo '<h2>' .$row. '</h2>';
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Exhibitions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>