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
        $query = $this->conn->pdo->prepare('SELECT u_id as id,u_name as name,u_lastname as lastname,u_email as email,u_password as password,u_isAdmin as isAdmin FROM users WHERE u_email = :email');
        $query->bindParam(':email', $request['Lemail']);
        $query->execute();

        $user = $query->fetch();
        
        if(count($user) > 0){
            $password=$request['Lpassword'];
            $password=md5($password);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['lastname']=$user['lastname'];
            $_SESSION['password']=$user['password'];
            $_SESSION['is_admin'] = $user['isAdmin']; 
          
            if($_SESSION['password']==$password){
                if ($_SESSION['is_admin']==1) {
                    header("Location: ADMIN/users.php");
                } else {
                    header("Location: home.php");
                }
            }
            
        }
        
    }
}
