<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $server="localhost";
    $username="root";
    $password="";
    $dbname="admin";
    // connecting to the admin database 
    $con=mysqli_connect($server,$username,$password,$dbname);
    if(!$con){
        die("connection failed due to ".mysqli_connect_error());
    }
}