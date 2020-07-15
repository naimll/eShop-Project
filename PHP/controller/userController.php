<?php


include_once './database/database.php';

class UserController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
      
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM users');

        return $query->fetchAll();
    }

    public function storeAdmin($request)
    {
        isset($request['is_admin']) ? $isAdmin = 1 : $isAdmin = 0;
		$password1=$request['password'];
		$password1=md5($password1);
		$query1=$this->db->pdo->prepare('SELECT * FROM users WHERE email=:email');
		$query1->bindParam(':email', $request['email']);
		$query1->execute();
		$user = $query1->fetchall();
		if(count($user)==0){
        $query = $this->db->pdo->prepare('INSERT INTO users (name, email, surname, password, is_admin) VALUES (:name, :email, :surname, :password, :is_admin)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':surname', $request['surname']);
        $query->bindParam(':password', $password1);
        $query->bindParam(':is_admin', $isAdmin);
        $query->execute();
		

        return header("Location: users.php");
		}
		else{
			echo 'Ky email ekziston';
		}
    }

    public function store($request)
    {
		
		
		$password1=$request['password'];
		$password1=md5($password1);
		
		
		$query1=$this->db->pdo->prepare('SELECT * FROM users WHERE email=:email');
		$query1->bindParam(':email', $request['email']);
		$query1->execute();
		$user = $query1->fetchall();
		if(count($user)==0){
        $query = $this->db->pdo->prepare('INSERT INTO users (name, email, surname, password) VALUES (:name, :email, :surname, :password)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':surname', $request['surname']);
        $query->bindParam(':password',$password1 );
        
        $query->execute();
		
		
        return header("Location: login.php");
		}
		else{
			echo "Ky email ekziston";
		}
		
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($id, $request)
    {
        isset($request['is_admin']) ? $isAdmin = 1 : $isAdmin = 0;

        $query = $this->db->pdo->prepare('UPDATE users SET name = :name, surname = :surname, email = :email, is_admin = :is_admin WHERE id = :id');
        $query->execute([
            'name' => $request['name'],
            'email' => $request['email'],
            'surname' => $request['surname'],
            'is_admin' => $isAdmin,
            'id' => $id
        ]);

    }

    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        
    }
}
