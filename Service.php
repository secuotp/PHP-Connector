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
    public static function sendRequest(XMLRequest $request, $serviceUrl, $method) {
        $postData = http_build_query(array('request' => $request->asXML()));
        if ($method == 'POST') {
            $opts = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => 'Content-type:application/xml',
                    'content' => $postData)
            );
        } elseif ($method === 'PUT') {
            $opts = array(
                'http' => array(
                    'method' => 'PUT',
                    'header' => 'Content-type:application/xml',
                    'content' => $postData)
            );
        }


        $context = stream_context_create($opts);
        $response = file_get_contents($serviceUrl, false, $context);

        return $response;
    }

    public static function sendRequestXML($xmlRequest, $serviceUrl, $method) {
        if ($method !== 'GET') {
            $postData = http_build_query(array('request' => $xmlRequest));
        } else{
            $serviceUrl = $serviceUrl.'?'.$xmlRequest;
            $response = file_get_contents($serviceUrl);
            return $response;
        }
        
        if ($method == 'POST') {
            $opts = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => 'Content-type:application/xml',
                    'content' => $postData)
            );
        } elseif ($method === 'PUT') {
            $opts = array(
                'http' => array(
                    'method' => 'PUT',
                    'header' => 'Content-type:application/xml',
                    'content' => $postData)
            );
        }


        $context = stream_context_create($opts);
        $response = file_get_contents($serviceUrl, false, $context);

        return $response;
    }

}
