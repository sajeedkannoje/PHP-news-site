<?php  
$link = "http://localhost/news-site/";

$servername = "localhost";
$username = "root";
$password = "";
$db = "news-site";
$conn = mysqli_connect($servername,$username, $password, $db) or die("failed".mysqli_connect_errno());

?>