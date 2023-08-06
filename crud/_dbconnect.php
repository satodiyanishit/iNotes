<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);

//die if connection was not succesfull
if(!$conn)
{
  die("Sorry we failed to connect: ". mysqli_connect_error());
}

?>