<?php



class Signup{

    
    
   
    public function validate($first_name,$last_name,$gender,$email,$password,$confirm_password){

        
        //Declare password strength variables
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(empty($first_name) || empty($last_name) || empty($gender) || empty($email) || empty($password) || empty($confirm_password)){
           header("location:signup.php?empty_fields");
           exit();
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header("location:signup.php?invalid_email");
            exit();
        }
        elseif($password != $confirm_password){
            header("location:signup.php?password_mismatch");
            exit();
        }
        //Password strength
        elseif( !$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6){
            header("location:signup.php?invalid_password");
            exit();
        }
                
        else{
            $this->create_user($first_name,$last_name,$gender,$email,$password);
        }  
          
    }
        
    public function create_user($first_name,$last_name,$gender,$email,$password){

       
        //Create these
       
        
        //Insert query
        // $query = "INSERT INTO users (user_id,first_name,last_name,gender,email,password,url_address) VALUES ('$user_id','$first_name','$last_name','$gender','$email','$$password','$url_address')";
        			
        
        $DB = new Database_connection();
        $DB->insert($first_name,$last_name,$gender,$email,$password);

    }
    
  


}






  


?>