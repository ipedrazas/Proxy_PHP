<?php

    require_once 'proxy.php';

    $proxy = new ProxyPHP();

    $proxy->base_url = "http://localhost:9200";

    $query = $proxy->gt("query");
    if($query){
        $es_params = '/simple/webpage/_search?size=20&q=$query&fields=file.title,url';
        $json_result = $proxy->get($es_params);
        echo $json_result;
    }


?>

