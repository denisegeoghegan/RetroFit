<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './Controller/JerseyController.php';
$jerseyController = new JerseyController();

if(isset($_POST['types'])){
    
    //Pull all jerseys of selected type
   $jerseyTables = $jerseyController->CreateJerseyTables($_POST['types']);
}

else {
    
    //Pull up all jerseys on load
  $jerseyTables = $jerseyController->CreateJerseyTables('%');
}

//Output contents of jerseyT
$title = "Our products";
$content = $jerseyController->CreateJerseyDropdownList() . $jerseyTables;

$content1 = '<form>
    <input type="text" name="first" placeholder="Firstname">
    <input type="text" name="last" placeholder="Lastname">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <button type="submit">Sign up</button>
    
</form>';

include './Template.php';

?>