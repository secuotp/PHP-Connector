<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Service
 *
 * @author zenology
 */
class Service {

    //put your code here

    public static function send(DoubleArrayList $param, $serviceUrl) {
        $newUrl = $serviceUrl . '?';
        for ($i = 0; $i < $param->size(); $i++) {
            $newUrl = $newUrl . $param->getKey($i) . '=' . $param->getValue($i);
            if ($i < $param->size() - 1) {
                $newUrl = $newUrl . '&';
            }
        }

        $contextOptions = array(
                'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                    'allow_self_signed' => true
                ]
            
        );
        $sslContext = stream_context_create($contextOptions);

        $response = file_get_contents($newUrl, false, $sslContext);
        $responseData = new XMLResponse($response);
        return $responseData;
    }

    public static function sendPOST(XMLRequest $request, $serviceUrl) {
        $postData = http_build_query(array('request' => $request->asXML()));
        $opts = array(
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type:application/xml',
                'content' => $postData
            ],
            'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                    'allow_self_signed' => true
            ]
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($serviceUrl, false, $context);
        $responseData = new XMLResponse($response);
        return $responseData;
    }

    public static function sendPUT(XMLRequest $request, $serviceUrl) {
        $postData = http_build_query(array('request' => $request->asXML()));
        $opts = array(
            'http' => [
                'method' => 'PUT',
                'header' => 'Content-type:application/xml',
                'content' => $postData,
            ],
            'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                    'allow_self_signed' => true
            ]
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($serviceUrl, false, $context);
        $responseData = new XMLResponse($response);
        return $responseData;
    }

    private function parseResponse($xml) {
        $response = new XMLResponse($xml);
        return $response;
    }

}
