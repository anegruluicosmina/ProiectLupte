<?php

if(isset($_POST['submit'])){
    require 'dbh.inc.php';
    session_start();
    

    $uid=$_SESSION['pwdreset'];
    $qst1=$_POST['securityQuestion1'];
    $asw1=$_POST['answer1'];
    $qst2=$_POST['securityQuestions2'];
    $asw2=$_POST['answer1'];

    if(empty($asw1) || empty($asw2)){
        header('Location: ../resetanswers.php?error=emptyfileds');
        exit();
    }elseif( $qst1 == '0' || $qst2== '0'){
        header('Location: ../resetanswers.php?error=questions&uid='.$username.'&mail='.$email,true);
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $asw1) || !preg_match("/^[a-zA-Z0-9]*$/", $asw2)){
        header('Location: ../resetanswers.php?error=invalidformat');
        exit();
    }else{
        $sql= "UPDATE users SET question1='".$qst1."', answer1=?, question2 ='".$qst2."', answer2=? where (uidUsers='". $uid."' or emailUsers='".$uid."'); ";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../resetanswers.php?error=sqlerror');
            exit();
        }else{
            $answ1Hashed=password_hash($asw1, PASSWORD_DEFAULT);
            $answ2Hashee=password_hash($asw2, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 'ss', $answ1Hashed, $answ2Hashee);
            mysqli_stmt_execute($stmt);
            header('Location: ../resetanswers.php?reset=success');
        }

    }
}