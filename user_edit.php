<h4><u>Update Your Profile:</u></h4>
    <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM shows WHERE s_id='$id';";
            $res = mysqli_query($connect, $query);

            foreach ($res as $row) {
        ?>
                <form action="add_gallery.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['s_id'] ?>">
                    <div class="container">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="fullname" value="<?php echo $row['fullname'] ?>" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label>Show Time</label>
                            <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label>Presented By</label>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Mailing Address" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Enter Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="container">
                        <input type="submit" name="edit_user" value="Update" class="btn btn-dark my-3">
                    </div>
                </form>
                
        <?php
            }
        }
        ?>