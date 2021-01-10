<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
?>    
<link rel="stylesheet" href="signup.css">
<div class="wrapper-main">
    <main class="contact-form">
    <h2>Insert Password </h2>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error']=='emptyfields'){
                echo "<p class='signuperror'> Fill in all fields</p><br>";
            }elseif($_GET['error']=='dontmatch'){
                echo "<p class='signuperror'>Passwords don't match</p><br>";
            }elseif($_GET['error']=='sql'){
                echo "<p class='signuperror'>Sorry, a sql error occurred </p><br>";
            }
    
        }
    ?>
        <form action="includes/insertpwd.inc.php"  method="POST">
            <input class= "input" type="password" name='pwd1' placeholder="Password">
            <input class= "input" type="password" name='pwd2' placeholder="Password">
            <button type="submit" name="submit">Submit </button>
            <?php
            if(isset($_GET['success'])){
                header('Location: question.php');
              }
             ?>
        </form>
    </main>
</div>