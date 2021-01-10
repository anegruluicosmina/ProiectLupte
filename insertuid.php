<?php
    require 'header.php';
?>
<link rel="stylesheet" href="signup.css">

<main class="contact-form">
    <h2> Reset Password <br><br> Insert your username/email </h2>
    <?php
    if(isset($_GET['error'])){
        if($_GET['error']=='emptyfieldss'){
            echo "<p class='signuperror'> Fill in all field </p>";
        }elseif($_GET['error']== 'sql'){
            echo "<p class='signuperror'> Sql error </p>";
        }elseif($_GET['error']== 'usernotfound'){
            echo "<p class='signuperror'> user not found </p>";
        }
    }elseif(isset($_GET['insert'])){
        if($_GET['insert']=='success'){
            if(isset($_GET['uid'])){
                session_start();
                $_SESSION['pwdreset']= $_GET['uid'];
                header("Location: resetpwd.php?uid=".$_GET['uid']);
                
            }
        }
    }
    ?>
    <form class="form-sigin" action="includes/insertuid.inc.php" method="POST">
        <input class="input" type="text" name="uidreset" placeholder="Username/Email...">
        <button class="signin" type="submit" name="submitrest">Submit </button>
    </form>
</main>