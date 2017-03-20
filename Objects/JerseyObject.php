<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JerseyObject
 *
 * @author s.salu
 */
class JerseyObject {
    //put your code here
    public $id;
    public $condition;
    public $design;
    public $price;
    public $team;
    public $players;
    public $image;
    public $details;
 
    
    function __construct($id, $condition, $design, $price, $team, $players, $image, $details) {
        $this->id = $id;
        $this->condition = $condition;
        $this->design = $design;
        $this->price = $price;
        $this->team = $team;
        $this->players = $players;
        $this->image = $image;
        $this->details = $details;     
    }
    
    
    
}



?>