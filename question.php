<?php
    require 'header.php';
    require 'includes/dbh.inc.php';

?>    
<style>
    .link{
        font-size:16px; 
        font-weight: bold;
         color: black; 
         padding:8px 
    }

</style>
<link rel="stylesheet" href="signup.css">
<div class="wrapper-main">
    <main class="contact-form">
        <h2> Succesful reset! </h2> <br>
        <h2> Do you want to change the security questions and answers for more security?  </h2>
        <div class='reset-answers'>
            <a href="resetanswers.php" class='link' >Yes</a>
            <a href="index.php" class='link' > No </a>
        </div>
    </main>
</div>