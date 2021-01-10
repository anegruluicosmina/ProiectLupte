<?php

session_start();



if(isset($_POST['submit'])){

    require 'dbh.inc.php';

    $username= $_SESSION['pwdreset'];
    $answer1=$_POST['answer1'];
    $answer2=$_POST['answer2'];

    if(empty($answer1) || empty($answer2)){
        header('Location: ../resetpwd.php?uid='.$username.'&error=emptyfields');
        exit();
    }else{
        $sql="SELECT answer1, answer2 from users where uidUsers='".$username."' OR emailUsers='".$username."';";
        $result=mysqli_query($conn, $sql);
        //$resultCheck=mysqli_num_rows($result);
        if($result){
            $row=mysqli_fetch_assoc($result);
            if(password_verify($answer1, $row['answer1']) && password_verify($answer2, $row['answer2'])){
                header('Location: ../resetpwd.php?success=success&uid='.$username.'');
                exit();
            }else{
                header('Location: ../resetpwd.php?uid='.$username.'&error=notfound');
                exit();
            }
        }else{
            //header('Location: ../resetpwd.php?error=sql');
            print mysqli_error($conn);
            exit();
    }
    }
}else{
    header("Location: ../index.php?notclickedonsubmit");
    exit();
}