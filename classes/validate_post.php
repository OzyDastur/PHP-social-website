<?php


class DB_Connection {
    
    private $host = "localhost:3307";
    private $username ="root";
    private $password  = "";
    private $db = "userregistration";
    
    
    function connect(){
        $connection = new mysqli($this->host,$this->username,$this->password,$this->db);

        return $connection;

    }

    function validate($post){

        $connect = $this->connect();
        $insert = "INSERT INTO posts (post) VALUES ('$post')";
        $result = mysqli_query($connect,$insert);

        
        
    }


}


?>