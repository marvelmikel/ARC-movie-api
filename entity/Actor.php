<?php
    declare (strict_types=1);
    class Actor{
        
        // object properties
        public int $id;
        public string $name;
        public string $dob;

        public $actors;

        
        public function __construct(){
            $this->id =  hexdec(uniqid());
            // get initial actors list from session
            $this->actors = $_SESSION['actors'] ?? [];
        }

        public function create($actor): Actor{
            $this->name = $actor->name;
            $this->dob = $actor->dob;
            $actor->id = $this->id;
            array_push($this->actors, $actor);

            // save to session
            $_SESSION['actors'] = $this->actors;
            
            return $actor;
        }


        public function getActor($id){
            $index = array_search($id, array_column($this->actors, 'id'));
            return $this->actors[$index];
        }

        public function getActors(){
            return $_SESSION['actors'];
        }

        public function getName(){
            return $this->name;
        }
        public function getDob(){
            return $this->dob;
        }
        
    }