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
    private $service;
    private $domainName;
    private $serialnumber;
    private $paramTag;

    public function __construct() {
        $this->service = array();
        $this->domainName = '';
        $this->serialnumber = '';
        $this->paramTag = new ArrayList();
    }

    function getService() {
        return $this->service;
    }

    function setService($service) {
        $this->service = $service;
    }

    public function getDomainName() {
        return $this->domainName;
    }

    public function getSerialnumber() {
        return $this->serialnumber;
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

    function getParamTag() {
        return $this->paramTag;
    }

    function setParamTag($paramTag) {
        $this->paramTag = $paramTag;
    }

    public function addChildValue($tagName, $value) {
        $tag = new XMLTag();
        $tag->setTagName($tagName);
        $tag->setValue($value);
        $this->paramTag->add($tag);
    }

    public function addChildTag($tagName) {
        $tag = new XMLTag();
        $tag->setTagName($tagName);
        $tag->setChildNode(new ArrayList());

        $this->paramTag->add($tag);
        return $this->paramTag->get($this->paramTag->size() - 1);
    }

    private function setParameter($xml, XMLTag $tag) {
        $xml = $xml . '<' . $tag->getTagName() . '>';
        if ($tag->haveChildNode()) {
            for ($i = 0; $i < $tag->getChildNode()->size(); $i++) {
                $xml = $this->setParameter($xml, $tag->getChildNode()->get($i));
            }
            $xml = $xml . '</' . $tag->getTagName() . '>';
        } else {
            $xml = $xml . $tag->getValue() . '</' . $tag->getTagName() . '>';
        }
        return $xml;
    }

    public function asXML() {
        $xml = '<?xml version="1.0"?>'
                . '<secuotp>' . '<service sid="' . $this->service[0] . '">' . $this->service[1] . '</service>'
                . '<authentication>'
                . '<domain>' . $this->domainName . '</domain>'
                . '<serial>' . $this->serialnumber . '</serial>'
                . '</authentication>'
                . '<parameter>';
        for ($i = 0; $i < $this->paramTag->size(); $i++) {
            $xml = $this->setParameter($xml, $this->paramTag->get($i));
        }

        $xml = $xml . '</parameter></secuotp>';


        return $xml;
    }

}
