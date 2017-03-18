<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './Controller/JerseyController.php';

$jerseyController = new JerseyController();

$title = "Add new jersey";

if (isset($_GET["update"])) {

    $jersey = $jerseyController->GetJerseyByID(($_GET["update"]));

    $content = "<form action='' method='post'>
    <fieldset>
        <legend>Update jersey information</legend><br/>
        
        <label for='condition'>Condition: </label>
        <input type='text' class='inputField' name='txtCondition' value='$jersey->condition'/><br/>
   
       
        <label for='design'>Design: </label>
        <input type='text' class='inputField' name='txtDesign' value='$jersey->design'/><br/>
        
        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' value='$jersey->price'/><br/>
        
        
        <label for='team'>Team: </label>
        <select class='inputField' name='ddlTeam'>
            <option value='%'>All</option>"
            . $jerseyController->CreateOptions($jerseyController->GetAllJerseyTypes()) . "
        </select> <br/>
        
        <label for='players'>Players: </label>
        <input type='text' class='inputField' name='txtPlayers' value='$jersey->players'/><br/>
        
        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
            . $jerseyController->GetImages() . "</select><br/>
        
        <label for='details'>Details: </label>
        <textarea cols='60' rows='15' name='txtDetails'>$jersey->details</textarea><br/>
        
        <input type='submit' value='Submit'>
        
    </fieldset>
</form>";
} else {

    $content = "<form action='' method='post'>
    <fieldset>
        <legend>Add new jersey</legend><br/>
        
        <label for='condition'>Condition: </label>
        <input type='text' class='inputField' name='txtCondition'/><br/>
   
       
        <label for='design'>Design: </label>
        <input type='text' class='inputField' name='txtDesign'/><br/>
        
        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice'/><br/>
        
        
        <label for='team'>Team: </label>
        <select class='inputField' name='ddlTeam'>
            <option value='%'>All</option>"
            . $jerseyController->CreateOptions($jerseyController->GetAllJerseyTypes()) . "
        </select> <br/>
        
        <label for='players'>Players: </label>
        <input type='text' class='inputField' name='txtPlayers'/><br/>
        
        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
            . $jerseyController->GetImages() . "</select><br/>
        
        <label for='details'>Details: </label>
        <textarea cols='60' rows='15' name='txtDetails'></textarea><br/>
        
        <input type='submit' value='Submit'>
        
    </fieldset>
</form>";
}
if (isset($_GET["update"])) {
    if (isset($_POST["txtCondition"])) {
        $jerseyController->UpdateJersey($_GET["update"]);
    }
} else {
    if (isset($_POST["txtCondition"])) {
        $jerseyController->InsertJersey();
    }
}



include './Template.php';
?>
