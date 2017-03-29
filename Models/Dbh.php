<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'Credentials.php';

$conn = mysqli_connect($host, $user, $passwd, $database);

if(!$conn){
    die("Connection failed".mysqli_connect_error());
    
}

