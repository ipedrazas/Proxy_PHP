##ProxyPHP

ProxyPHP is a small utility class to proxy your javascript service calls. Using javascript frameworks like Backbone or Angular.js you end up calling services that perhaps you don't want to expose openly to the wide world.

For example, we need to call the ElasticSearch url, but we don't want to have ElasticSearch accessible from internet so, instead of calling

    http://localhost:9200/simple/webpage/_search?size=20&q=$query&fields=file.title,url

we call

    SearchProxy.php?query=python

that contains
    <?php

		// SearchProxy.php
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

It's based on the [Pest library](https://github.com/educoder/pest) with some other bits and bobs added.

> Written by [Ivan Pedrazas](http://twiter.com/ipedrazas).
