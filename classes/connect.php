<?php




class Database_connection {
    
    private $host = "localhost:3307";
    private $username ="root";
    private $password  = "";
    private $db = "chat";
    
    
    function connect(){
        $connection = new mysqli($this->host,$this->username,$this->password,$this->db);

        return $connection;

    }

    function read($email,$password){
        
        $connect = $this->connect();

        
        $sql = "SELECT * FROM users WHERE email =?";

        
        $stmt = mysqli_stmt_init($connect);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        
        if($row=mysqli_fetch_assoc($result)){
           
            $hashPassword = password_verify($password,$row['password']);
    
            if($hashPassword == true){

                session_start();
                $_SESSION['id']             = $row['id'];
                $_SESSION['email']      	=$row['email'];
                $_SESSION['first_name']     = $row['first_name'];
                $_SESSION['last_name']      = $row['last_name'];
                $_SESSION['gender']         = $row['gender'];
                $_SESSION['email']          = $row['email'];
                $_SESSION['date']           = $row['date'];
                
                header("location:profile.php");
                exit();
            }
            else{
                header("location:login.php?invalid_password");
                exit();
            }
        }
        else{
            header("location:login.php?invalid_email");
            exit();
        }
    }

    function insert( $first_name , $last_name, $gender , $email, $password){

    
        $connect = $this->connect();
        
        $insert= "INSERT INTO users (first_name, last_name, gender, email , password) VALUES (?,?,?,?,? )";
        $stmt = mysqli_prepare($connect,$insert);
        $hashPassword =password_hash($password,PASSWORD_DEFAULT);
        
        
        mysqli_stmt_bind_param($stmt,"sssss",$first_name,$last_name,$gender,$email,$hashPassword);
        mysqli_stmt_execute($stmt);
        mysqli_close($connect);

        header ("location:signup.php?success_message");
        
       

    }

}

   


?>