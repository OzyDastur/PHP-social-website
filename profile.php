
<?php
    include ("header.php");
?>
<?php
    $connection = mysqli_connect("localhost:3307","root","","userregistration");
    $display = "SELECT * FROM  users";
    $query = mysqli_query($connection,$display);

    
    if($row=mysqli_fetch_assoc($query)){
        
        $pic = $row['profile_image'];
        
        
    

    }


?>

<link rel="stylesheet" href="styles/profil.css">

<div class="container" >
    
<?php
    $connection = mysqli_connect("localhost:3307","root","","chat");
    $display = "SELECT * FROM  users WHERE id = $id";
    $query = mysqli_query($connection,$display);
    if($row=mysqli_fetch_assoc($query)){
        
        $pic = $row['profile_image'];
    ?>
   <span>
        <?php echo "<img src='$pic'>";?><br>
        <a href="change_profile_image.php" style="text-decoration:none; font-size:12px; color:brown;">Change picture</a><br>
    </span>
   
   <?php }?>

    <span> <?php echo ucfirst($_SESSION['first_name'])." ".ucfirst($_SESSION['last_name']); ?></span>
   
    
    
        
        <div class="links">
           
            <a href="#" >Timeline</a>
            <a href="#">About </a>
            <a href="#">Photos</a>
            <a href="#">Settings</a>
           
        </div>
    
    <div class="main">
        <div class="left">
            
        </div>
        <div class="right">
        
          
        </div>
        </div>
        
    </div>
    
    

    

    
</div>





<?php 

include ("footer.php");

?>