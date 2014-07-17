<?php
    include 'Asset/ArrayList.php';
    include 'XMLRequest.php';
?>
<html>
    <head>
        <title>Hello</title>
    </head>
    <body>
        <?php
            $request = new XMLRequest();
            $request->setSid('M-01');
            $request->setDomainName("haro.gmail.com");
            $request->setSerialnumber('XXXXX-XXXXX-XXXXX-XXXXX');
            $request->addChildValue("fname", "Panasan");
            $changeTag = $request->addChildTag("change");
            $changeTag->addChildValue("parameter", "username");
            $changeTag->addChildValue("value", "hahaha");
            
            $xml = $request->asXML();
            echo $xml;
        ?>
    </body>
</html>