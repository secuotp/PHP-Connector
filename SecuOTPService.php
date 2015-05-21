<?php
include 'Asset/ArrayList.php';
include 'Asset/User.php';
include 'XMLRequest.php';
include 'Service.php';
include 'ServiceStatus.php';

class SecuOTPService {

    private $SITE_NAME = 'https://128.199.82.168/SecuOTP-Service/';
    private $domain;
    private $serialNumber;

    public function __construct($domain, $serialNumber) {
        $this->domain = $domain;
        $this->serialNumber = $serialNumber;
    }

    function getDomain() {
        return $this->domain;
    }

    function getSerialNumber() {
        return $this->serialNumber;
    }

    function setDomain($domain) {
        $this->domain = $domain;
    }

    function setSerialNumber($serialNumber) {
        $this->serialNumber = $serialNumber;
    }

    function registerEndUser($username, $email, $firstName, $lastName, $phone) {
        $req = new XMLRequest();
        $req->setService(XMLParam::$M01);
        $req->setDomainName($this->domain);
        $req->setSerialNumber($this->serialNumber);
        $req->setParamTag(new ArrayList());
        $req->addChildValue('username', $username);
        $req->addChildValue('email', $email);
        $req->addChildValue('fname', $firstName);
        $req->addChildValue('lname', $lastName);
        $req->addChildValue('phone', $phone);
        
        $response = Service::sendPOST($req, $this->SITE_NAME.'manage/register/end-user');
        if ($response != NULL) {
            return new ServiceStatus($response->getStatus(), $response->getMessage());
        }
        return NULL;
    }

    function disableEndUser($username, $removalCode) {
        $req = new XMLRequest();
        $req->setService(XMLParam::M02);
        $req->setDomainName($this->domain);
        $req->setSerialNumber($this->serialNumber);
        $req->setParamTag(new ArrayList());
        $req->addChildValue('username', $username);
        $req->addChildValue('code', $removalCode);
        
         $response = Service::sendPOST($req, $this->SITE_NAME.'manage/disable/end-user');
        if ($response != NULL) {
            return new ServiceStatus($response->getStatus(), $response->getMessage());
        }
        return NULL;
    }
    
    function generateOneTimePassword($username) {
        $req = new XMLRequest();
        $req->setService(XMLParam::$G01);
        $req->setDomainName($this->domain);
        $req->setSerialNumber($this->serialNumber);
        $req->setParamTag(new ArrayList());
        $req->addChildValue('username', $username);
        
         $response = Service::sendPOST($req, $this->SITE_NAME.'otp/generate');
        if ($response != NULL) {
            return new ServiceStatus($response->getStatus(), $response->getMessage());
        }
        return NULL;
    }
    
    function authenticateOneTimePassword($username, $otp) {
        $req = new XMLRequest();
        $req->setService(XMLParam::$A01);
        $req->setDomainName($this->domain);
        $req->setSerialNumber($this->serialNumber);
        $req->setParamTag(new ArrayList());
        $req->addChildValue('username', $username);
        $req->addChildValue('password', $otp);
        
         $response = Service::sendPOST($req, $this->SITE_NAME.'otp/authenticate');
        if ($response != NULL) {
            return new ServiceStatus($response->getStatus(), $response->getMessage());
        }
        return NULL;
    }
    
    // if type = 0 is Full 1 is Default
    function getUserInfo($username, $type) {
        $req = new XMLRequest();
        $req->setService(XMLParam::$U01);
        $req->setDomainName($this->domain);
        $req->setSerialNumber($this->serialNumber);
        $req->setParamTag(new ArrayList());
        $req->addChildValue('username', $username);
        
        $typeString = 'default';
        if ($type == 0) {

        } else if ($type == 1) {
            $typeString = 'full';
        }
        req.addChildValue('type', $typeString);
        
        $response = Service::sendPOST($this->SITE_NAME + 'user/end-user');
        $list = $response->getParameter();
        $u = new User();
        $u->setUsername($list->getValue('username'));
        $u->setEmail($list->getValue('email'));
        $u->setFirstName($list->getValue('fname'));
        $u->setLastName($list->getValue('lname'));
        $u->setPhone($list->getValue('phone'));
        
        if (type == 1) {
            $u->setRemovalCode($list->getValue('removal'));
            $u->setSerialNumber($list->getValue('serial'));
        }

        $status = new ServiceStatus($response->getStatus(), $response->getMessage());
        $status.setData(u);

        return $status;
    }
    
    // channel == 0 is sms, 1 is mobile

    function sendMigrationRequest($username) {
        $req = new XMLRequest();
        $req->setService(XMLParam::$O01);
        $req->setDomainName($this->domain);
        $req->setSerialNumber($this->serialNumber);
        $req->addChildValue('username', $username);

        $response = Service::sendPOST($req, $self->SITE_NAME.'otp/migrate');
        $list = $response->getParameter();
        
        return $list->getValue('migration-code');
    }
}

class XMLParam {
    
    public static $M01 = array('M-01', 'Register End-User');
    public static $M02 = array('M-02', 'Disable End-User');
    public static $G01 = array('G-01', 'Generate One-Time Password');
    public static $A01 = array('A-01', 'Authenticate One-Time Password');
    public static $O01 = array('O-01', 'Migrate One-Time Password Channel');
    public static $O02 = array('O-02', 'Time Sync');
    public static $U01 = array('U-01', 'Get End-User Data');
    public static $U02 = array('U-02', 'Set End-User Data');

}

?>