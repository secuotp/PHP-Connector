<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'XMLTag.php';
include 'XMLResponse.php';
/**
 * Description of XMLRequest
 *
 * @author zenology
 */
class XMLRequest {

    //put your code here
    private $sid;
    private $domainName;
    private $serialnumber;
    private $parmaTag;

    public function __construct() {
        $this->sid = '';
        $this->domainName = '';
        $this->serialnumber = '';
        $this->parmaTag = new ArrayList();
    }

    public function getSid() {
        return $this->sid;
    }

    public function getDomainName() {
        return $this->domainName;
    }

    public function getSerialnumber() {
        return $this->serialnumber;
    }

    public function getParmaTag() {
        return $this->parmaTag;
    }

    public function setSid($sid) {
        $this->sid = $sid;
    }

    public function setDomainName($domainName) {
        $this->domainName = $domainName;
    }

    public function setSerialnumber($serialnumber) {
        $this->serialnumber = $serialnumber;
    }

    public function setParmaTag($parmaTag) {
        $this->parmaTag = $parmaTag;
    }

    public function addChildValue($tagName, $value) {
        $tag = new XMLTag();
        $tag->setTagName($tagName);
        $tag->setValue($value);
        $this->parmaTag->add($tag);
    }

    public function addChildTag($tagName) {
        $tag = new XMLTag();
        $tag->setTagName($tagName);
        $tag->setChildNode(new ArrayList());
        
        $this->parmaTag->add($tag);
        return $this->parmaTag->get($this->parmaTag->size() - 1);
    }

    private function setParameter($xml, XMLTag $tag) {
        $xml = $xml.'<'.$tag->getTagName().'>';
        if ($tag->haveChildNode()) {
            for ($i = 0; $i < $tag->getChildNode()->size(); $i++) {
                $xml = $this->setParameter($xml, $tag->getChildNode()->get($i));
            }
            $xml = $xml.'</'.$tag->getTagName().'>';
        } else {
            $xml = $xml.$tag->getValue().'</'.$tag->getTagName().'>';
        }
        return $xml;
    }

    public function asXML() {
        $xml = '<?xml version="1.0"?>'
               .'<secuotp>'.'<service sid="'.$this->sid.'">a</service>'
               .'<authentication>'
                .'<domain>'.$this->domainName.'</domain>'
                .'<serial>'.$this->serialnumber.'</serial>'
               .'</authentication>'
               .'<parameter>';
        for($i = 0;$i < $this->parmaTag->size(); $i++){
            $xml = $this->setParameter($xml, $this->parmaTag->get($i));
        }
        
        $xml = $xml.'</parameter></secuotp>';
        
        
        return $xml;
        
    }

}
