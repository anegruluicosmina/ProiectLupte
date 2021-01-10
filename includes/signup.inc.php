<?php
            
    if(isset($_POST['signup-submit'])){
        require 'dbh.inc.php';

        $username=$_POST["uid"];
        $email=$_POST["email"];
        $pwd=$_POST["pwd"];
        $pwd2= $_POST["pwd-repeat"];
        $question1=$_POST["securityQuestion1"];
        $answer1=$_POST["answer1"];
        $question2=$_POST['securityQuestions2'];
        $answer2=$_POST['answer2'];

        if(empty($username)|| empty($email) || empty($pwd)|| empty($pwd2) ||empty($answer1) || empty($answer2)){
            header('Location: ../signup.php?error=emptyfieldss&uid='.$username.'&mail='.$email,true);
            exit();
        }elseif( $question1 == '0' || $question2== '0'){
            header('Location: ../signup.php?error=questions&uid='.$username.'&mail='.$email,true);
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=mailuid");
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=mail&uid=".$username);
            exit();
        }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=username&mail=".$email);
            exit();
        }elseif($pwd!==$pwd2){
            header("Location: ../signup.php?error=pwdcheck&uid=".$username."&mail=".$email);
            exit();
        }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $answer1)){
            header("Location: ../signup.php?error=answer1&mail=".$email."&username=".$username);
            exit();
        }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $answer2)){
            header("Location: ../signup.php?error=answer2&mail=".$email."&username=".$username);
            exit();
        }
        else{
         $sql= "SELECT uidUsers FROM users WHERE uidUsers=?;";
         $stmt= mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sql");
            exit();
         } else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck= mysqli_stmt_num_rows($stmt);
            if($resultcheck>0){
                header("Location: ../signup.php?error=uidtaken&mail=".$email);
                exit();
            }else{
                $sql="INSERT INTO users ( uidUsers, emailUsers, pwdUsers, question1, answer1,question2,	answer2) VALUES(?,?,?,?,?,?,?);";
                $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }else{
                    $hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);
                    $hashedAnsw1=password_hash($answer1, PASSWORD_DEFAULT);
                    $hashedAnsw2=password_hash($answer2,  PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssisis", $username, $email, $hashedPwd, $question1, $hashedAnsw1,$question2,$hashedAnsw2 );
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
                
            }
        }
    }        
         mysqli_stmt_close($stmt);
         mysqli_close($conn);   
    }else{
        header("Location: ../signup.php");
        exit();
    }