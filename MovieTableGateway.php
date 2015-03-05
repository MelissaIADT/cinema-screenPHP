<?php

class MovieTableGateway {
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getMovies(){
        $sqlQuery = "SELECT * FROM movies";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if(!$status){
            die("Could not retrieve movie.");
        }
        
        return $statement;
    }
    
    public function getMovieById($id){
        $sqlQuery = "SELECT * FROM movies WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not retrieve movie.");
        }
        
        return $statement;
    }
    
    public function insertMovie($t, $yr, $rt, $c, $d){
        $sqlQuery = "INSERT INTO movies " .
                "(title, year released, run time, classification, director)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "title" => $t,
            "year released" => $yr,
            "run time" => $rt,
            "classification" => $c,
            "director" => $d
        );
        
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not insert movie.");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
        
    public function deleteMovie($id){
        $sqlQuery = "DELETE FROM movies WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not delete movie");
        }
        
        return($statement->rowCount()==1);
    }
    
    public function updateMovie($id, )
   
    }
