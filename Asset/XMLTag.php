<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of XMLTag
 *
 * @author zenology
 */
class XMLTag {

    //put your code here
    private $tagName;
    private $value;
    private $childNode;

    public static function withValue($tagName, $value){
        $instance = new self();
        $instance->tagName = $tagName;
        $instance->value = $value;
        $instance->childNode;
        return $instance;
    }
    
    public static function withChild($tagName, ArrayList $childNode){
        $instance = new self();
        $instance->tagName = $tagName;
        $instance->value;
        $instance->childNode = $childNode;
    }

    public function getTagName() {
        return $this->tagName;
    }

    public function getValue() {
        return $this->value;
    }

    public function getChildNode() {
        return $this->childNode;
    }

    public function setTagName($tagName) {
        $this->tagName = $tagName;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setChildNode($childNode) {
        $this->childNode = $childNode;
    }

    public function haveChildNode() {
        return !is_null($this->childNode);
    }

    public function getChildTag($index) {
        return $this->childNode->get($index);
    }

    public function addChildValue($tagName, $value) {
        $tag = XMLTag::withValue($tagName, $value);
        $this->childNode->add($tag);
    }

    public function addChildTag(String $tagName) {
        $tag = XMLTag::withChild($tagName, new ArrayList());
        $this->childNode->add($tag);
        return $this->childNode->get($this->childNode->size() - 1);
    }

}
