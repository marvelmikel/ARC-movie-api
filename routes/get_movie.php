<?php

include('controller/MovieController.php');
$controller = new MovieController();

parse_str($_SERVER['QUERY_STRING'], $params);
if(!isset($params['id'])){
   exit();
}

$controller->getMovie($params['id']);
