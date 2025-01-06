<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "gallery";

$connect = mysqli_connect("$dbServername", "$dbUsername", "$dbPassword", "$dbName");

if (!$connect)
{
    die("<script>alert('connection failed.')</script>");
}

$dbconfig = mysqli_select_db($connect, $dbName);

if($dbconfig)
{
   // echo "Database Connected";
}
else
{
    echo '
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Database Connection Failed</h1>
                <p>Please Check Your Database Connection</p>
            </div>
        </div>
    </div>
    ' ;
}

?>