<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JerseyObjectModel
 *
 * @author s.salu
 */

//Contains database connection code

require ("Objects/JerseyObject.php");



class JerseyModel {
    //put your code here
    
    //Get jerseys and return them by team in an array
    function GetAllJerseyTypes(){
        require 'Credentials.php';
        
        //Open connection to DB
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
        $result = mysql_query("SELECT DISTINCT team FROM jerseys") or die (mysql_error());
        $types = array();
        
        //Get data from db
        while($row = mysql_fetch_array($result)){
            array_push($types, $row[0]);
        }
        
        //Close db and get results
        
        mysql_close();
        return $types;
    }
    
    
    //Get JerseyObject objects from db in an array
    function GetJerseyByType($type){
        
        require 'Credentials.php';
        
        //Open connection to DB
        mysql_connect($host, $user, $passwd) or die (mysql_error());
        mysql_select_db($database);
        
        $query = "SELECT * FROM jerseys WHERE team LIKE '$type'";
        $result = mysql_query($query) or die (mysql_error());
        $jerseyArray = array();
        
        //Return data from db
        while($row = mysql_fetch_array($result)){
            $id = $row[0];
            $condition = $row[1];
            $design = $row[2];
            $price = $row[3];
            $team = $row[4];
            $players = $row[5];
            $image = $row[6];
            $details = $row[7];
            
            //Create jersey objects and save them in an array
            $jersey = new JerseyObject($id, $condition, $design, $price, $team, $players, $image, $details);
            array_push($jerseyArray, $jersey);
        }
        
        //Close db and return array 
        mysql_close();
        return $jerseyArray;
        
    } 
    //Pull Jersey by db ID number - for CMS(Content management system) 
    function GetJerseyByID($id){
           require 'Credentials.php';
        
        //Open connection to DB
        mysql_connect($host, $user, $passwd) or die (mysql_error());
        mysql_select_db($database);
        
        $query = "SELECT * FROM jerseys WHERE id = '$id'";
        $result = mysql_query($query) or die (mysql_error());
        
        //Return data from db
        while($row = mysql_fetch_array($result)){
            $condition = $row[1];
            $design = $row[2];
            $price = $row[3];
            $team = $row[4];
            $players = $row[5];
            $image = $row[6];
            $details = $row[7];
            
            //Create jersey object
            $jersey = new JerseyObject($id, $condition, $design, $price, $team, $players, $image, $details);
        }
        
        //Close db and return array 
        mysql_close();
        return $jersey;
        
        
    }   
    //Insert new record to DB
    function InsertJersey(JerseyObject $jersey){
        
         $query = sprintf("INSERT INTO 'jerseys'('condition', 'design', 'price', 'team', 'players', 'image', 'details') 
                 VALUES('%s','%s','%s','%s','%s','%s','%s')",
                 mysql_real_escape_string($jersey->condition),
                 mysql_real_escape_string($jersey->design),
                 mysql_real_escape_string($jersey->price),
                 mysql_real_escape_string($jersey->team),
                 mysql_real_escape_string($jersey->players),
                 mysql_real_escape_string('Images/Jersey/' . $jersey->image),
                 mysql_real_escape_string($jersey->details));
         
                 $this->DBQuery($query);
     
    }
      //Edit existing record
    function UpdateJersey($id, JerseyObject $jersey){

         $query = sprintf("UDPATE 'jerseys' SET 'condition' = '%s', 'design' = '%s', 'price' = '%s',
          'team' = '%s', 'players' = '%s', 'image' = '%s', 'details' = '%s' WHERE 'id' = $id",
                 mysql_real_escape_string($jersey->condition),
                 mysql_real_escape_string($jersey->design),
                 mysql_real_escape_string($jersey->price),
                 mysql_real_escape_string($jersey->team),
                 mysql_real_escape_string($jersey->players),
                 mysql_real_escape_string('Images/Jersey/' . $jersey->image),
                 mysql_real_escape_string($jersey->details));
         
         $this->DBQuery($query);
      
    }
      //Delete a row in db by id
    function DeleteJersey($id){

        $query = "DELETE FROM jerseys WHERE id = $id";
        
        $this->DBQuery($query);

    }  
    //Query function 
    function DBQuery($query){
        
                
         //Open connection to db
        require 'Credentials.php';
        mysql_connect($host, $user, $passwd) or die(mysql_error());
        mysql_select_db($database);
   
        //Execute query and close connection
        mysql_query($query) or die(mysql_error());
        mysql_close();
        
        
    }
}

?>