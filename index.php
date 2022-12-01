<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    session_start() ; 
    // database connection will be here

    class Route {

        /*
        two parameters.
    
        route : route address
        file : location of the controller to call if route address matched
    
        */
        public function add($route, $file){
                
            //replacing first and last forward slashes
            //$_REQUEST['uri'] will be empty if req uri is /

            if(!empty( $_SERVER['PHP_SELF'])){
                $route = preg_replace("/(^\/)|(\/)/","",$route);
                $reqUri =  preg_replace("/(^\/)|(\/$)/", "", $_SERVER['PHP_SELF'] );
            }else{
                $reqUri = "/";
            }
    
            if($reqUri == $route ){
                //on match include the file. 
                include($file);
                //exit because route address matched.
                exit();
            }
            
        }
    }
    

    //Route instance
    $route = new Route();

   //var_export($_SERVER['PHP_SELF']);
    
    //route address and home.php file location
    $route->add("get-actors", "routes/get_actors.php");
    $route->add("get-actor", "routes/get_actor.php");
    $route->add("create-actor", "routes/create_actor.php");

    $route->add("get-movies", "routes/get_movies.php");
    $route->add("get-movie", "routes/get_movie.php");
    $route->add("get-movie-actors", "routes/get_movie_actors.php");
    $route->add("create-movie", "routes/create_movie.php");

