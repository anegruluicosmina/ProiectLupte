<?php
if(isset($_POST['submit'])){
    require 'dbh.inc.php';

    session_start();

    $uid=$_SESSION['pwdreset'];
    $pwd1=$_POST['pwd1'];
    $pwd2=$_POST['pwd2'];

    if(empty($pwd1) || empty($pwd1)){
        header ('Location: ../insertpwd.php?error=emptyfields');
        exit();
    }elseif($pwd1 != $pwd2){
        header('Location: ../insertpwd.php?error=dontmatch');
        exit();
    }else{
        $sql="UPDATE users Set pwdUsers=? where uidUsers='".$uid."' OR emailUsers='".$uid."';";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../insertpwd.php?error=sql');
            exit();
        }else{
            $hashedPwd=password_hash($pwd1, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 's', $hashedPwd);
            mysqli_stmt_execute($stmt);
            header('Location: ../insertpwd.php?success=success');
        }
    }
    mysqli_stmt_close($stmt);
    myslqi_close($conn);


}else{
    header('Location: ../index.php');
}