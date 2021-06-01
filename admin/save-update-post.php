<?php
include "config.php";

if(empty ($_FILES['newimage']['name'])){
    $file_name = $_POST['oldimage'];
}else
{
    $error = array();
    $file_name = $_FILES['newimage']['name'];
    $file_size = $_FILES['newimage']['size'];
    $file_tmp = $_FILES['newimage']['tmp_name'];
    $file_type = $_FILES['newimage']['type'];
    $exp = explode('.',$file_name);
    $file_ext = end($exp);
    $extension = array("jpeg","jpg","png");
    if(in_array($file_ext,$extension) === false){
        $error[] = "this extension file not allow";
    }
    if($file_size > 2097152){
        $error[]="file size must be 2mb or lower";
    }
    if(empty($error) == true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }
    else{
        print_r($error);
        die();
    }
}

 $sql = "UPDATE post SET title = '{$_POST["post_title"]}' , description = '{$_POST["postdesc"]}' ,category= {$_POST["category"]} , post_img = '{$file_name}'

WHERE post_id={$_POST ["post_id"]};";
if( $_POST["oldcategory"] != $_POST["category"] ){

    $sql.=  "UPDATE category SET category.post = post - 1 WHERE category.category_id = {$_POST["oldcategory"]};";
    $sql.=  "UPDATE category SET category.post = post + 1 WHERE category.category_id = {$_POST["category"]};";
}


// echo $sql;
// die();
$result = mysqli_multi_query($conn,$sql);
if($result){
   
    header("location:$link/admin/post.php");
}
else{
    echo "query failed";
}



?>