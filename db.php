<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "user_system";

$conn = new mysqli($host,$user,$password,$dbname);

if ($conn->connect_error) {
    die ("اتصال به دیتا بیس ناموفق بود:" . $conn->connect_error);

}
?>