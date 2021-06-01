<?php
if($_SESSION["user_role"]== 0){
    header("location:$link/admin/post.php");
    
    }
    

$userid= $_GET['id'];

include "config.php";
$sql="DELETE from user WHERE user_id = {$userid}";
$result = mysqli_query($conn,$sql);
header("location:$link/admin/users.php");

?>