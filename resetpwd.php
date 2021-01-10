<?php
    require 'header.php';
    require 'includes/dbh.inc.php';

?>    
<link rel="stylesheet" href="signup.css">
<main class="contact-form">
        <?php 
            if(isset($_GET['uid'])){
                echo "<h2>Welcome ". $_GET['uid']."!<br></h2>";
            }
        ?>
        <h2> Please insert your answers to the security questions <br></h2>
        <?php
            if(isset($_GET['uid'])){
                $uid=$_GET['uid'];
                if(isset($_GET['error'])){
                    if($_GET['error']){
                        if($_GET['error']== 'emptyfields'){
                            echo "<p class='signuperror'>Fill in all fields</p><br>";
                        }elseif($_GET['error']== 'notfound'){
                            echo "<p class='signuperror'> Incorrect answers. Try again. </p><br>";
                        }

                    }
                
                }else{
                if(isset($_GET['success'])){
                    header ('Location: insertpwd.php?uid='.$uid);                    
                }
            }
        }

        ?>
        <form  class= "form-sigin" action="includes/resetpwd.inc.php" method="POST">
            <label class= "input" for="question1">
                <?php 
                        if(isset($_GET['uid'])){
                            $uid=$_GET['uid'];
                            $sql="SELECT q.question FROM users u JOIN questions1 q WHERE u.question1 =q.id AND (u.uidUsers = '".$uid."' OR u.emailUsers = '".$uid."');";
                            $result= mysqli_query ($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['question'];
                        }
                ?>
            </label> <br>
            <input  class= "input" type="text" name="answer1" placeholder="Answer"><br>
            <label class= "input" for="question2">
                <?php
                    if(isset($_GET['uid'])){
                        $uid=$_GET['uid'];
                        $sql="SELECT q.question FROM users u JOIN questions1 q WHERE u.question2 =q.id AND (u.uidUsers = '".$uid."' OR u.emailUsers = '".$uid."');";
                        $result= mysqli_query ($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['question'];
                    }
                ?>
            </label> <br>
            <input class= "input" type="text" name="answer2" placeholder="Answer"><br>
            <button class= "signin" name ="submit"> Submit </button>
        </form>
</main>
