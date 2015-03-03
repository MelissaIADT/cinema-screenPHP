<?php

class ScreenTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    //Retrieves screens
    public function getScreens(){
        //execute the query to get all the screens in the table
        $sqlQuery = "SELECT s.*, m.name AS movieName
                FROM screendb s
                LEFT JOIN movies m ON m.id = s.movie_id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if(!$status){
            die("Could not retrieve screens..");
        }
        
        return $statement;
    }
    
    //Retrieves screens by using the movie ID
    public function getScreenByMovieId($movieId) {
        //execute the query to get the user with a certain ID
        $sqlQuery = "SELECT s.*, m.name AS movieName
                    FROM screendb s
                    WHERE s.movieId = :movieId";
        

        $params = array(
            'movieId' => $movieId
        );
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not retrieve screens");
        }
        
        return $statement;
    }
    
    
    //Retrieves screen by their ID
    public function getScreenById($id) {
        //execute the query to get the user with a certain ID
        $sqlQuery = "SELECT s.*, m.name AS movieName
                    FROM screendb s
                    LEFT JOIN movies m ON m.id = s.movie_id
                    WHERE s.id = :id";
        
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
    public function insertScreen($n, $ne, $ns, $dni, $pt, $mId){
        $sqlQuery = "INSERT INTO screendb " .
                "(name, numExits, numSeats, dateNextInspection, projectorType)" .
                "VALUES(:name, :numExits, :numSeats, :dateNextInspection, :projectorType, :movie_id)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "numExits" => $ne,
            "numSeats" => $ns,
            "dateNextInspection" => $dni,
            "projectorType" => $pt,
            "movie_id" => $mId
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
                "movie_id = :movie_id " .
                "WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n, 
            "numExits" => $ne,
            "numSeats" => $ns,
            "dateNextInspection" => $dni,
            "projectorType" => $pt,
            "movie_id" => $mId
        );
        
        $status = $statement->execute($params);
        
        /*if(!$status)
        {
            die("Could not update screen..");
        }*/
        
        return ($statement->rowCount() == 1);
    }
}
  
