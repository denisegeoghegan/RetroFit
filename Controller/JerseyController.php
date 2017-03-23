
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JerseyController
 *
 * @author s.salu
 */
require ("Models/JerseyModel.php");

//Containts non database related functions

class JerseyController {

    //put your code here
    function CreateJerseyDropdownList() {
        $jerseyModel = new JerseyModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a league: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptions($jerseyModel->GetAllJerseyTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptions(array $valueArray) {

        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }
        return $result;
    }

    function CreateJerseyTables($types) {

        $jerseyModel = new JerseyModel();
        $jerseyArray = $jerseyModel->GetJerseyByType($types);
        $result = "";

        //Generate a table for each in an array
        foreach ($jerseyArray as $key => $jersey) {
            $result = $result .
                    "<table class = 'jerseyTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$jersey->image' /></th>
                            <th width = '75px' >League: </th>
                            <td>$jersey->league</td>
                        </tr>
                        
                        <tr>
                            <th>Design: </th>
                            <td>$jersey->design</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$jersey->price</td>
                        </tr>
                        
                        <tr>
                            <th>Team: </th>
                            <td>$jersey->team</td>
                        </tr>
                        
                        <tr>
                            <th>Players: </th>
                            <td>$jersey->players</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$jersey->details</td>
                        </tr>                      
                     </table>";
        }
        return $result;
    }

    //Insert new jersey into DB
    function InsertJersey() {
        $league = $_POST['ddlLeague'];
        $design = $_POST['txtDesign'];
        $price = $_POST['txtPrice'];
        $team = $_POST['txtTeam'];
        $players = $_POST['txtPlayers'];
        $image = $_POST['ddlImage'];
        $details = $_POST['txtDetails'];


        $jersey = new JerseyObject(-1, $league, $design, $price, $team, $players, $image, $details);
        $jerseyModel = new JerseyModel();
        $jerseyModel->InsertJersey($jersey);
    }

    function UpdateJersey($id) {
        $league = $_POST["ddlLeague"];
        $design = $_POST["txtDesign"];
        $price = $_POST["txtPrice"];
        $team = $_POST["txtTeam"];
        $players = $_POST["txtPlayers"];
        $image = $_POST["ddlImage"];
        $details = $_POST["txtDetails"];

        $jersey = new JerseyObject($id, $league, $design, $price, $team, $players, $image, $details);
        $jerseyModel = new JerseyModel();
        $jerseyModel->UpdateJersey($id, $jersey);
    }

    function DeleteJersey($id) {
        $jerseyModel = new JerseyModel();
        $jerseyModel->DeleteJersey($id);
    }

    function GetJerseyByType($type) {

        $jerseyModel = new JerseyModel();
        return $jerseyModel->GetJerseyByType($type);
    }

    function GetJerseyByID($id) {

        $jerseyModel = new JerseyModel();
        return $jerseyModel->GetJerseyByID($id);
    }

    function GetAllJerseyTypes() {

        $jerseyModel = new JerseyModel();
        return $jerseyModel->GetAllJerseyTypes();
    }

    function GetImages() {
        //Select folder
        $handle = opendir("Images/Jersey");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }
        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }
        //Create <select> values and return them        
        $result = $this->CreateOptions($imageArray);
        return $result;
    }

    function CreateOverviewTable() {

        $result = "
<table class='overviewTable'>
    <tr>
        <td></td>
        <td></td>
        <td><b>Id</b></td>
        <td><b>league</b></td>
        <td><b>Design</b></td>
        <td><b>Price</b></td>
        <td><b>Team</b></td>
        <td><b>Players</b></td>
    </tr>";

        $jerseyArray = $this->GetJerseyByType('%');

        foreach ($jerseyArray as $key => $value) {
            $result = $result .
                    "<tr>
    <td><a href='CMSAdd.php?update=$value->id'>Update</a></td>
    <td><a href='#' onclick='confirmBox($value->id)'>Delete</a></td>
    <td>$value->id</td>
    <td>$value->league</td>
    <td>$value->design</td>
    <td>$value->price</td>
    <td>$value->team</td>
    <td>$value->players</td>
</tr>";
            
        }
        $result = $result . "</table>";
        return $result;
        }

}
?>

<script>
    //Display confirmation box before deleting object
    function confirmBox(id){
    
        var c = confirm("Press OK to delete this item.");
    
    if(c)
        window.location = "CMSOverview.php?delete=" + id;
}
</script>
