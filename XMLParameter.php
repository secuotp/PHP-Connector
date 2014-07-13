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

    private static $keyList;
    private static $valueList;
    private static $pointer;

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
        $key = self::$keyList[self::$pointer];
        $val = self::$valueList[self::$pointer];
        $array = array($key, $val);

        self::$pointer++;
        return $array;
    } 

    public function peek(){
        $key = self::$keyList[self::$pointer];
        $val = self::$valueList[self::$pointer];
        $array = array($key, $val);

        return $array;
    }

    public function hasNext(){
        return self::$pointer < sizeof(self::$keyList);
    }

    public function first(){
        self::$pointer = 0;
    }

    public function last(){
        self::$pointer = sizeof(self::$keyList);
    }

    public function getValue($key){
        for($i = 0; $i < sizeof(self::$keyList); $i++){
            if(self::$keyList[$i] === $key){
                return self::$valueList[$i];
            }
        }
        return NULL;
    }

    public function clear(){
        self::$keyList = NULL;
        self::$valueList = NULL;

        self::$keyList = array();
        self::$valueList = array();
        
        self::first();
    }
}
