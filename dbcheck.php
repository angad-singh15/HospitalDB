<?php

//database connection
$dbhost = 'localhost';
$dbname = 'hospital';
$username = 'root';
$pw = '';


$connection = mysqli_connect($dbhost, $username, $pw, $dbname);


if (!$connection)
{
    die("Connection failed:".mysqli_connect_error());
}

?>