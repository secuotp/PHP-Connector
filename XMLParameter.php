<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XMLParameter
 *
 * @author Zenology
 */
class XMLParameter {

    private $keyList = nil;
    private $valueList = nil;
    private $pointer;

    function __construct() {
        self::$keyList = array();
        self::$valueList = array();
        self::$pointer = 0;
    }

    public function add($paramName, $paramVal){
        $count = count(self::$keyList);
        self::$keyList[$count] = $paramName;
        self::$valueList[$count] = $paramVal;
    }

    public function pop(){
        $key = pop(self::$keyList);
        $val = pop(self::$valueList);
        $array = array($key, $val);

        return $array;
    } 
}
