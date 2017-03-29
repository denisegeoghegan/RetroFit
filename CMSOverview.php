<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Controller/JerseyController.php';

$title = "Manage Jerseys";

$jerseyController = new JerseyController();

$content = $jerseyController->CreateOverviewTable();

if(isset($_GET["delete"])){
    
    $jerseyController->DeleteJersey($_GET["delete"]);
    
}

include './Template.php';
