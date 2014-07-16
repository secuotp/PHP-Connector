<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArrayList
 *
 * @author Zenology
 */
class ArrayList{
    private $data;
    private $pointer;
    
    function __construct() {
        $this->data = array();
    }
    
    public function size(){
        return sizeof($this->data);
    }
    
    public function add($value){
        $this->data[$this->size()] = $value;
    }


    public function remove($index){
        for($i = $index + 1; $i < $this->size(); $i++){
            if($i !== $this->size()){
                $this->data[$i - 1] = $this->data[$i];
            }else{
                $this->data[$i] = NULL;
            }
        }
    }
    
    public function get($index){
        return $this->data[$index];
    }
}
