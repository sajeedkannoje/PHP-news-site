<div id ="footer">
    <div class="container">
        <div class="row">
        <?php 
                    include "config.php";
                    $logo = "SELECT * FROM settings";
                    $result = mysqli_query($conn,$logo);
                    if(mysqli_num_rows($result)){
                        while ($row = mysqli_fetch_assoc($result)){
                   
                    ?>
            <div class="col-md-12">
                <span><?php echo $row['footerdesc']; ?></span>
            </div>

            <?php }}?>
    </div>
</div>
</body>
</html>
