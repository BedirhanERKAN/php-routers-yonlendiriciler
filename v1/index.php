<?php
/*
 * Created by Bedirhan ERKAN
 * Github   :  BedirhanERKAN
 * Facebook :  BedirhanERKAN
 * Twitter  :  BedirhanERKAN
 * Youtube  :  BedirhanERKAN
 */
    require_once("router.php");
    
    $routers = new Router();

    $routers::config(array("error_none" => 1));




    Router::any("/","views/welcome.php",array());
    Router::any("/index.html","views/welcome.php",array());

    Router::any("/breaking-news/([0-9]+).html","views/breaking-news.php",array("news-id"));
    Router::any("/breaking-news/(.*)-([0-9]+).html","views/breaking-news.php",array("news-title","news-id"));
    Router::any("/webservice/v([0-9]+)/(.*)/(.*)/([0-9]+)","views/webservice.php",array("webservice-version","webservice-class","webservice-function","webservice-arg"));

    Router::post("/kayit-et/([0-9]+).html","views/post.php",array("post_id"));

    $routers->router();


?>
