<?php
    

    if(isset($_POST['submitrest'])){
        require 'dbh.inc.php';

        $uidd=$_POST['uidreset'];

        if(empty($uidd)){
            header('Location: ../insertuid.php?error=emptyfieldss');
            exit();
        }else{
            $sql="SELECT uidUsers FROM users WHERE uidUsers=? or emailUsers=?";
            $stmt= mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('Location: ../insertuid.php?error=sql');
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, 'ss', $uidd, $uidd);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck= mysqli_stmt_num_rows($stmt);
                if($resultCheck>0){
                    header('Location: ../insertuid.php?insert=success&uid='.$uidd);
                    exit();
                }else{
                    header('Location: ../insertuid.php?error=usernotfound');
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }else{
        header('Location: ../insertuid.php');
    }