<?php
  
  include('entity/Movie.php');
  class MovieController {

    private $model;

    public function __construct(){
        $this->model =   new Movie();
    }


    public function getMovies(){
        echo json_encode($this->model->movies);
    }

    public function getMovie($id){
        echo json_encode($this->model->getMovie($id) );
    }

    public function getMovieActors($id){
        echo json_encode($this->model->getMovieActors($id) );
    }

    public function createMovie(){
        $newMovie = (object) [
          'title' => "John Wick",
          'runtime' => 82378,
          'release_date' => '2022/11/11',
          'actors' => [
            [ "name" =>  "Connor Hoos", "character" => "Police" ],
            [ "name" =>  "Elim Bosh", "character" => "Mayor" ],
            [ "name" =>  "Fermi Borh", "character" => "Lecturer" ],
          ]
        ];


        $actorModel = new $this->model();
        $actor = $actorModel->create($newMovie);

        echo json_encode($actor);
    }
  }



