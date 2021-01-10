<?php

        if(isset($_GET['uid'])){
             $uid = $_GET['uid'];
             echo "yes".$uid;
        }else{
            echo "uid not set";
        }

    /*if(isset($_POST['win'])){
        require 'dbh.inc.php';
        $user = $_SESSION['userUid'];
        $sql = "UPDATE users set win = win + 1 where uidUsers ='" .$user. "';" ;
        myslqi_query ($con, $sql);
        header ('Location: ../index.php?uid='.$user);
    }elseif(isset($_POST['lost'])){
        $user = $_SESSION['userUid'];
        $sql = "UPDATE users set lose = lose + 1 where uidUsers ='" .$user. "';" ;
        myslqi_query ($con, $sql);
        header ('Location: ../index.php?uid='.$user);
    }*/