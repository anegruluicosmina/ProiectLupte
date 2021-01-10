<?php
    $servername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbNanme="loginsystem";

    $conn=mysqli_connect($servername, $dbUsername, $dbPassword, $dbNanme);
    if(!$conn){
        die("connection failde: ".mysqli_connect_error());

    }