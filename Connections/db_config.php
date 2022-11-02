<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "survey_form";

$conn = mysqli_connect($hostname,$username,$password,$database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: (".mysqli_connect_error().")";
}
mysqli_query($conn, "set names utf8");

?>