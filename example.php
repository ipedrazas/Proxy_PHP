<?php

/**
 * Using Proxy_PHP we will connect to a ElasticSearch URL, fetch some results and
 * return the results as Json
 *
 * This code is licensed for use, modification, and distribution
 * under the terms of the MIT License (see http://en.wikipedia.org/wiki/MIT_License)
 */

    require_once 'proxy.php';

    $proxy = new ProxyPHP();

    $proxy->base_url = "http://localhost:9200";
    $proxy->isJSON();
    // set the right content type to the proxy response
    header('Content-Type: application/json');


    $query = $proxy->gt("query");
    if($query){
        $es_params = '/simple/webpage/_search?size=20&q=$query&fields=file.title,url';
        $json_result = $proxy->get($es_params);
        echo $json_result;
    }


?>

