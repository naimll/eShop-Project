<?php


include_once './database/database.php';
class LoginController
{
      protected $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }

    public function login($request)
    {
        $query = $this->conn->pdo->prepare('SELECT u_id,u_name,u_lastname,u_email,u_password,u_isAdmin FROM users WHERE u_email = :email');
        $query->bindParam(':email', $request['email']);
        $query->execute();

        $user = $query->fetch();
        
        if(count($user) > 0){
           
           
            $_SESSION['user_id'] = $user['u_id'];
            $_SESSION['name'] = $user['u_name'];
            $_SESSION['lastname']=$user['u_lastname'];
            $_SESSION['password']=$user['u_password'];
            $_SESSION['is_admin'] = $user['u_isAdmin']; 
            
            if($_SESSION['password']==$request['password']){
                if ($_SESSION['is_admin']==1) {
                    header("Location: admin/users.php");
                } else {
                    header("Location: home.php");
                }
            }
            
        }
        
    }
}
