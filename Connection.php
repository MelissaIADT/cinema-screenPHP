<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance(){
        if(Connection::$connection === NULL){
            $host = 'daneel'; 
            $database = 'N00130962'; 
            $username = 'N00130962'; 
            $password = 'N00130962'; 
            
            $dsn = 'mysql:dbname='.$database.";host=".$host;
            Connection::$connection = new PDO($dsn, $username, $password);
            if(!Connection::$connection){
                die("Could not connect to database!");
            }
        }
        
        return Connection::$connection;
    }
}
