<?php
  
  include('entity/Actor.php');
  class ActorController {

    private $model;

    public function __construct(){
        $this->model =   new Actor();
    }


    public function getActors(){
        echo json_encode($this->model->actors);
    }

    public function getActor($id){
        echo json_encode($this->model->getActor($id) );
    }

    public function createActor(){
        $newActor = (object) [
          'name' => "John Doe",
          'dob' => '4/5/1997'
        ];
        $actorModel = new $this->model();
        $actor = $actorModel->create($newActor);

        echo json_encode($actor);
    }
  }



