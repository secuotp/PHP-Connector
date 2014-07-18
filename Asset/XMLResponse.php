<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XMLResponse
 *
 * @author zenology
 */
class XMLResponse {

    //put your code here
    private $status;
    private $message;
    private $parameter;

    public function __construct($xml) {
        $this->parameter = new XMLParameter();
        /* $parse = new SimpleXMLElement($xml);
          $this->status = $parse->xpath('/secuotp/@status')[0];
          $this->message = $parse->xpath('/secuotp/message')[0];
          for($i = 0; $i < sizeof($parse->xpath('/secuotp/response/*')); $i++){
          $this->parameter->add('a', $parse->xpath('/secuotp/response/*')[$i]->asXML());
          } */
        $a = simplexml_load_string($xml);
        $this->status = $a->xpath('/secuotp/@status')[0];
        $this->message = $a->message[0];
        if($a->response->count() > 0) {
            foreach ($a->response->children() as $param) {
                $this->parameter->add($param->getName(), $param);
            }
        }
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getParameter() {
        return $this->parameter;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setParameter($parameter) {
        $this->parameter = $parameter;
    }

}
