<?php
    include 'Asset/ArrayList.php';
    include 'XMLRequest.php';
    include 'Service.php';
?>
<html>
    <head>
        <title>Hello</title>
    </head>
    <body>
        <?php
            $request = new XMLRequest();
            $request->setSid('U-01');
            $request->setDomainName("https://hoax.co.jp");
            $request->setSerialnumber('34BWS-GH56N-JQ45M-PP2HG');
            $request->addChildValue("username", "zenology");
            $request->addChildValue("type", "full");
            
            
            echo Service::sendRequest($request, 'http://secuotp.sit.kmutt.ac.th/SecuOTP-Service/user/end-user', 'POST');
            
        ?>
    </body>
</html>