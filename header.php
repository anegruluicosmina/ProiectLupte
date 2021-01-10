<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset= "utf-8">
    <meta name="description" content= "example of a meta description, this will often show up in search results">
    <meta name= "viewport" content= "width= device-width, initial-scale=1">
    <title>my site </title>
    <link rel="stylesheet" href= "header.css">

</head>
<body>
    <header>
        <div class="up-meniu">

            <div class= "header-logo">
                <a  href= "index.php">
                    <img src="img/logo.png" alt ="logo" >
                </a>
            </div>

            <div class="minimeniu">
                <ul> 
                    <li><a href = "#"> Profile</a></li>
                    <li><a href = "#"> About</a></li>
                </ul>
            </div>

        </div>
        <div class= "header-login">

            <?php
                if(isset($_SESSION['userUid'])){
                        echo "<div class= 'user-loged'> 
                               <p>Hey there! Play the greatest RPG ever to be made!</p>";
                        echo "<form action= 'includes/logout.inc.php' methode='post'>
                              <button  type='submit' name='logout-submit'> Log out </button>
                              </form>
                              </div>";
                }else{
                    if(isset($_GET['error'])){
                        if($_GET['error']== 'emptyfields'){
                            echo "<p> Fill in all fields</p>";
                        }elseif($_GET['error']== 'sql'){
                            echo '<p>Sorry, we had an sql error.</p>';
                        }elseif($_GET['error']=='wrongpwd'){
                            echo '<p>Wrong password.</p>';
                        }elseif($_GET['error']=='nouser'){
                            echo '<p>Invalid user.</p>';
                        }
                    }
                        echo "<div class='login'>
                                <form action='includes/login.inc.php' method= 'post' >
                                    <input type ='text' name= 'mailuid' placeholder= 'Username/Email...'>
                                    <input type=  'password'  name='pwd' placeholder='Password'>
                                    <button type='submit' name= 'login-submit'> Log in </button>
                                </form>
                                <div class='register-links'>
                                    <a href='signup.php'> Sign up </a>
                                    <a href='insertuid.php'  > Forgetten Password? </a>
                                 </div>    
                            </div>";
                }
            ?>
        </div>
    </header>
    
</body>
</html>