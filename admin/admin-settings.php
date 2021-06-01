<?php include "header.php"; 

?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">

                  <!-- Form -->


                  <?php 
                  include "config.php";
                  $sql = "SELECT * FROM settings";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_assoc($result)){

                  
                  
                  ?>
                  <form  action="save-admin-setting.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Web Title</label>
                          <input type="text" name="web_title" class="form-control" value="<?php echo $row['web_title']; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Footer Description</label>
                          <textarea name="footerdesc" class="form-control" rows="5" value="<?php echo $row['footerdesc']; ?>" > <?php echo $row['footerdesc']; ?> </textarea>
                      </div>
                      
                      
                      <div class="form-group">

                <label for="">Post image</label>
                <input type="file" name="newimage" >
              
                <img  src="images/<?php echo $row['logo']; ?>" height="150px">
              
                <input type="hidden" name="oldimage" value="<?php echo $row['logo']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Save" required />

                  </form>

                  <?php

                  
                      }}?>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
