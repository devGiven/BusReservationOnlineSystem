<?php
$conn= new mysqli('localhost','root','','bus_reservation_database');

if (!$conn)
{
    error_reporting(0);
    die("Could not connect to mysql".mysqli_error($conn));
}

?>