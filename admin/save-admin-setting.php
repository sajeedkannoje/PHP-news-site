<?php
include "config.php";

if(empty ($_FILES['newimage']['name'])){
    $logo = $_POST['oldimage'];
}else
{
    $error = array();
    $logo = $_FILES['newimage']['name'];
    $file_size = $_FILES['newimage']['size'];
    $file_tmp = $_FILES['newimage']['tmp_name'];
    $file_type = $_FILES['newimage']['type'];
    $exp = explode('.',$logo);
    $file_ext = end($exp);
    $extension = array("jpeg","jpg","png");
    if(in_array($file_ext,$extension) === false){
        $error[] = "this extension file not allow";
    }
    if($file_size > 2097152){
        $error[]="file size must be 2mb or lower";
    }
    if(empty($error) == true){
        move_uploaded_file($file_tmp,"images/".$logo);
    }
    else{
        print_r($error);
        die();
    }
}

$webtitle = mysqli_real_escape_string($conn, $_POST['web_title']);
$fotterdesc = mysqli_real_escape_string($conn, $_POST['footerdesc']);

$sql = "UPDATE settings SET web_title = '{$_POST["web_title"]}' , logo = '{$logo}', footerdesc = '{$fotterdesc}'";



if(mysqli_multi_query($conn,$sql)){
    header("location:$link/admin/admin-settings.php");
}
else{
    echo "query fsailed";
}


?>