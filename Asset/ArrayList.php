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
class ArrayList {

    private $data;

    function __construct() {
        $this->data = array();
    }

    public function size() {
        return sizeof($this->data);
    }

    public function add($value) {
        $this->data[$this->size()] = $value;
    }

    public function remove($index) {
        for ($i = $index + 1; $i < $this->size() + 1; $i++) {
            if ($i !== $this->size()) {
                $this->data[$i - 1] = $this->data[$i];
            } else {
                unset($this->data[$this->size() - 1]);
            }
        }
    }

    public function get($index) {
        return $this->data[$index];
    }

}

class DoubleArrayList extends ArrayList {

    private $key;

    public function __construct() {
        parent::__construct();
        $this->key = array();
    }

    public function add($key, $value) {
        parent::add($value);
        $this->key[sizeof($this->key)] = $key;
    }

    public function getValue($index) {
        return parent::get($index);
    }

    public function getKey($index) {
        return $this->key[$index];
    }

    public function remove($index) {
        for ($i = $index + 1; $i < $this->size() + 1; $i++) {
            if ($i !== $this->size()) {
                $this->data[$i - 1] = $this->data[$i];
                $this->key[$i - 1] = $this->key[$i];
            } else {
                unset($this->data[$this->size() - 1]);
                unset($this->key[$this->size() - 1]);
            }
        }
    }

    public function size() {
        return sizeof($this->key);
    }

}

class XMLParameter extends DoubleArrayList {

    private $pointer;

    public function __construct() {
        parent::__construct();
        $this->pointer = 0;
    }

    public function pop() {
        $array = $this->peek();
        $this->pointer++;
        return $array;
    }

    public function peek() {
        $array = array(parent::getKey($this->pointer), parent::getValue($this->pointer));
        return $array;
    }

    public function hasNext() {
        return $this->pointer < parent::size();
    }
    
    public function first(){
        $this->pointer = 0;
    }
    
    public function last(){
        $this->pointer = parent::size() - 1;
    }
}
