<?php

function connection(){
    $host = "localhost";
    $user = "admin";
    $pass = "komm2024";
    $bd = "mydb";
    $connect = mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);
    return $connect;
}
