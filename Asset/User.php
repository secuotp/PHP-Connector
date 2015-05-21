<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {
    private $username;
    private $email;
    private $firstName;
    private $lastName;
    private $phone;
    private $removalCode;
    private $serialNumber;
    
    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getPhone() {
        return $this->phone;
    }

    function getRemovalCode() {
        return $this->removalCode;
    }

    function getSerialNumber() {
        return $this->serialNumber;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setRemovalCode($removalCode) {
        $this->removalCode = $removalCode;
    }

    function setSerialNumber($serialNumber) {
        $this->serialNumber = $serialNumber;
    }


}
?>

