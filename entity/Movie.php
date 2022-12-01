<?php
    declare (strict_types=1);
    class Movie {


        
        // object properties
        public int $id;
        public string $title;
        public int $runtime;
        public string $release_date;

        public array $movies;
            
        public function __construct(){
            $this->id =  hexdec(uniqid());
            $this->movies = $_SESSION['movies'] ?? [];
        }


        public function create($movie){
            
            $this->title = $movie->title;
            $this->runtime = $movie->runtime;
            $this->release_date = $movie->release_date;


            // $movie['actors'] = $movie->actors;

            $movie->id = $this->id;
            array_push($this->movies, $movie);

            // save to session
            $_SESSION['movies'] = $this->movies;
            
            return $movie;
        }



        public function getMovie($id){
            $index = array_search($id, array_column($this->movies, 'id'));
            return $this->movies[$index];        
        }

        public function getMovieActors($id){
            $index = array_search($id, array_column($this->movies, 'id'));
            return $this->movies[$index]->actors;        
        }


        public function getMovies(){
            return $this->movies;
        }

        public function getTitle(){
            return $this->title;
        }
        public function getRuntime(){
            return $this->runtime;
        }
        public function getReleaseDate(){
            return $this->release_date;
        }
        public function getActors(){
            return $this->actors;
        }
        
    }