<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Asset/XMLResponse.php';
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
        $response = file_get_contents($newUrl);
        $response = new XMLResponse($response);
        return $response;
    }

    public static function sendPOST(XMLRequest $request, $serviceUrl) {
        $postData = http_build_query(array('request' => $request->asXML()));
        $opts = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/xml',
                'content' => $postData)
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($serviceUrl, false, $context);
        $response = new XMLResponse($response);
        return $response;
    }

    public static function sendPUT(XMLRequest $request, $serviceUrl) {
        $postData = http_build_query(array('request' => $request->asXML()));
        $opts = array(
            'http' => array(
                'method' => 'PUT',
                'header' => 'Content-type:application/xml',
                'content' => $postData)
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($serviceUrl, false, $context);
        $response = new XMLResponse($response);
        return $response;
    }

    private function parseResponse($xml) {
        $response = new XMLResponse($xml);
        return $response;
    }

}
