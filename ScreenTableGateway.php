<?php

class ScreenTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getScreens(){
        //execute the query to get all the screens in the table
        $sqlQuery = "SELECT * FROM screendb";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if(!$status){
            die("Could not retrieve screens..");
        }
        
        return $statement;
    }
    
    public function getScreenById($id) {
        //execute the query to get the user with a certain ID
        $sqlQuery = "SELECT * FROM screendb WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not retrieve screen");
        }
        
        return $statement;
    }
    
    //Insert
    public function insertScreen($n, $ne, $ns, $dni, $pt){
        $sqlQuery = "INSERT INTO screendb " .
                "(name, numExits, numSeats, dateNextInspection, projectorType)" .
                "VALUES(:name, :numExits, :numSeats, :dateNextInspection, :projectorType)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "numExits" => $ne,
            "numSeats" => $ns,
            "dateNextInspection" => $dni,
            "projectorType" => $pt,
        );
                
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not insert screen");
        } 
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    //Delete
    public function deleteScreen($id){
        $sqlQuery = "DELETE FROM screendb WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not delete screen..");
        }
        return ($statement->rowCount() == 1);
    }
    
    //Update
    public function updateScreen($id, $n, $ne, $ns, $dni, $pt){
        $sqlQuery = 
                "UPDATE screendb SET " .
                "name = :name, " .
                "numExits = :numExits, " .
                "numSeats = :numSeats, " .
                "dateNextInspection = :dateNextInspection, " .
                "projectorType = :projectorType " .
                "WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n, 
            "numExits" => $ne,
            "numSeats" => $ns,
            "dateNextInspection" => $dni,
            "projectorType" => $pt
        );
        
        $status = $statement->execute($params);
        
        if(!$status)
        {
            die("Could not update screen..");
        }
        
        return ($statement->rowCount() == 1);
    }
}
  
