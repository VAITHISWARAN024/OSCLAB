<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn)
{
    echo "Database Connected";
}
else
{
    echo "Not Connected";
}

?>