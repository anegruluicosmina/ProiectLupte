<?php
     require "header.php";
?>
    <link rel="stylesheet" href="signup.css">

<body>
    <main>
            <section class="contact-form">
                <h2> SignUp </h2>
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]== "emptyfieldss"){
                            echo "<p class='signuperror'>Fill in all fields!</p>";
                        }elseif($_GET['error'] == "mail"){
                            echo "<p class='signuperror'>Invalid email!</p>";
                        }elseif($_GET['error']=="mailuid"){
                            echo "<p class='signuperror'>Invalid username!</p>"; 
                        }elseif($_GET['error']== "username"){
                            echo "<p class='signuperror'>Invalid username!</p>"; 
                        }elseif($_GET['error']=="pwdcheck"){
                            echo "<p class='signuperror'>Your passwords doesn't match!</p>"; 
                        }elseif($_GET['error']=="uidtaken"){
                            echo "<p class='signuperror'>Username is already taken!</p>"; 
                        }elseif($_GET['error']=="answer"){
                            echo "<p class='signuperror'>Invalid answer!</p>"; 
                        }elseif($_GET['error']=="questions"){
                            echo "<p class='signuperror'>Choose a question!</p>";
                        }
                    }elseif(isset($_GET['signup'] )){
                        if($_GET['signup']=="success")
                        echo "<p class='signuperror'>Successful signup!</p>"; 
                    }
                ?>
                <form class= "form-sigin" action="includes/signup.inc.php" method="post">
                <?php
                    if( isset($_GET['uid'])){
                        $uid=$_GET['uid'];
                        echo '<input class= "input" type="text" name="uid" placeholder="Username" value="'.$uid.'">';
                    }else{
                        echo '<input class= "input" type="text" name="uid" autocomplete="off" placeholder="Username" >';
                    }
                    if( isset($_GET['mail'])){
                        $email=$_GET['mail'];
                        echo '<input class= "input" type="text" name="email"  placeholder="Email" value="'.$email.'">  ';
                    }else{
                        echo '<input class= "input" type="text" name="email" autocomplete="off" placeholder="Email">  ';
                    }


                ?>
                
                      
                    <input class= "input" type="password" name="pwd" placeholder="Password">
                    <input class= "input" type="password" name="pwd-repeat" placeholder="Repeat password">
                    <select class= "input" name="securityQuestion1">
                        <optgroup>
                            <option value="0">Select a question</option>
                            <option value="111"> What was your childhood nickname? </option>
                            <option value="555"> What street did you live on in third grade?</option>
                            <option value="333"> In what city or town did your mother and father meet?</option>
                            <option value="999"> What was your favorite place to visit as a child? </option>
                        </optgroup>
                    </select>
                    <input type="text" class="input" name="answer1" autocomplete="off" placeholder="Answer">
                    <select class="input" name="securityQuestions2">
                        <optgroup>
                            <option value="0">Select a question</option>
                            <option value="777"> What was your dream job as a child?</option>
                            <option value="222"> What was the name of your first stuffed toy?</option>
                            <option value="888"> Where did you vacation last year?</option>
                            <option value="444"> What was your driving instructor's first name?</option>
                        </optgroup>
                    </select>    
                    <input type="text" class="input" name="answer2" autocomplete="off" placeholder="Answer">
                    <button class= "signin" type="submit" name="signup-submit"> SignUp </button>
                </form>  
            </section>
    <main>
 </body>
<?php
    require "footer.php";
?>