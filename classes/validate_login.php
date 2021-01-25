<?php

class Login{

    public function validate($email,$password){


        if(empty($email) || empty($password)){
            header("location:login.php?empty_fields");
        }
        else{
            $DB_connection = new Database_connection();
            $DB_connection->read($email,$password);

            //Here's the new code

           

        } 
        
    }



}


?>