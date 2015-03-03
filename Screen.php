<?php

class Screen {
    private $id;
    private $name;
    private $numExits;
    private $numSeats;
    private $dateNextInspection;
    private $projectorType;
    
    public function __construct($id, $n, $ne, $ns, $dni, $pt){
        $this->id = $id;
        $this->name = $n;
        $this->numExits = $ne;
        $this->numSeats = $ns;
        $this->dateNextInspection = $dni;
        $this->projectorType = $pt;
    }

    public function getId() { return $this->id; }
    public function getName() { return  $this->name; }
    public function getNumExits() { return  $this->numExits; }
    public function getNumSeats() { return  $this->numSeats; }
    public function getDateNextInspection() { return $this->dateNextInspection; }
    public function getProjectorType() { return $this->projectorType;}
}
