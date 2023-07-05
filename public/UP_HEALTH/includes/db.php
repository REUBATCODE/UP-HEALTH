<?php
require 'config.php';
function connectDB(){
    $con = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);
    if(!$con){
        print_r("no conecto a base de datos". mysqli_connect_error($con));
    }
    return $con;
}