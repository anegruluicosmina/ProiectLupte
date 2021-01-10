 <?php
 require 'header.php';

 ?>

<link rel="stylesheet" href="signup.css">
    <main class="contact-form">
        <h2>Reset questions and answers</h2>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error']== 'emptyfileds'){
                echo "<p class='signuperror'>Fill in all fields!</p>";
            }elseif($_GET['error']=='invalidformat'){
                echo "<p class='signuperror'>Invalid answer!</p>";
            }elseif($_GET['error']== 'sql'){
                echo "<p class='signuperror'>Sql error!</p>";
            }elseif($_GET['error']=="questions"){
                echo "<p class='signuperror'>Choose a question!</p>";
            }
        }elseif(isset($_GET['reset'])){
            header('Location: succesfulreset.php');
        }

        ?>
        <form class= "form-sigin"  action="includes/resetanswers.inc.php" method="post">
            <select class= "input" name="securityQuestion1">
                <optgroup>
                        <option value="0">Select a question</option>
                        <option value="111"> What was your childhood nickname? </option>
                        <option value="555"> What street did you live on in third grade?</option>
                        <option value="333"> In what city or town did your mother and father meet?</option>
                        <option value="999"> What was your favorite place to visit as a child? </option>
                </optgroup>    
            </select>
            <input type="text" class="input" name="answer1" placeholder="Answer">
            <select class="input" name="securityQuestions2">
                    <optgroup>
                        <option value="0">Select a question</option>
                        <option value="777"> What was your dream job as a child?</option>
                        <option value="222"> What was the name of your first stuffed toy?</option>
                        <option value="888"> Where did you vacation last year?</option>
                        <option value="444"> What was your driving instructor's first name?</option>
                    </optgroup>
                </select>     
            <input type="text" class="input" name="answer2" placeholder="Answer">
            <button class= "signin" type="submit" name="submit"> Submit</button>
        </form>
    </main>
