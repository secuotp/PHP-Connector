<?php

include 'Asset/ArrayList.php';
include 'XMLRequest.php';
include 'Service.php';

$request = new XMLRequest();
$request->setSid('U-02');
$request->setDomainName("https://hoax.co.jp");
$request->setSerialnumber('34BWS-GH56N-JQ45M-PP2HG');
$request->addChildValue("username", "aa");
$changeTag = $request->addChildTag("change");
$changeTag->addChildValue("param","fname");
$changeTag->addChildValue("value","fname");

$parse = Service::sendPUT($request, "http://secuotp.sit.kmutt.ac.th/SecuOTP-Service/user/end-user");

echo $parse->getMessage();
while($parse->getParameter()->hasNext()){
    $txt = $parse->getParameter()->pop();
    echo $txt[0].' = '.$txt[1].'<br/>';
}
?>
