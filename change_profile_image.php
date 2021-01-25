<?php

include ("header.php");

?>
<?php
$connection = mysqli_connect("localhost:3307","root","","chat");

    if(isset($_POST['upload'])){

        $filetmpname = $_FILES['profile_image']['tmp_name'];//Getting from location
        $filename = "uploads/".$_FILES['profile_image']['name'];//Destination
        
        move_uploaded_file($filetmpname,$filename);
       
      
        $update = "UPDATE users SET profile_image='$filename' WHERE id = $id";
        $query = mysqli_query($connection,$update);
     
      
        if($query){
            echo "Image uploaded successfully";
        }

      
       
    }

?>
<link rel="stylesheet" href="styles/profile_image.css">

<div class="image-wrapper">
<form action="" method="POST" enctype="multipart/form-data">
    
    <input  type="file" class="form-control" name="profile_image"  ><br>
    <button type="submit" name="upload"  class="btn btn-primary">Upload </button>

</form>
</div>

<?php


include ("footer.php");


?>