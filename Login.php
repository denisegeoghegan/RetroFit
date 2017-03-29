<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './Models/Dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$query = "SELECT * FROM `user` WHERE `uid`='$uid' AND `pwd`='$pwd'";
$result = $conn->query($query);


if (!$row = $result->fetch_assoc()) {
    echo "Your username or password is incorrect!";
} else {
     echo "You are logged in.";
}

header("Location: index.php");

