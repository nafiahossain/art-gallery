<?php

session_start();
include('connection.php');

if($dbconfig)
{
    // echo "Database Connected";
}
else
{
    header("Location: connection.php");
}
?>

