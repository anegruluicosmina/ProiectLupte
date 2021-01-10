<?php
     require "header.php";
?>
    <main style="background-color: black ">
    <?php
    if(isset($_SESSION['userUid']) && !empty($_SESSION['userUid'])){
        require "index.html";
    }else{
        
       echo" <p style= 'color:white'> you are logged out or is empty </p>";
    }
    
    ?>
    
    <main>
<?php
    require "footer.php";
?>