<?php

include('controller/ActorController.php');
$controller = new ActorController();

parse_str($_SERVER['QUERY_STRING'], $params);
if(!isset($params['id'])){
   exit();
}

$controller->getActor($params['id']);
