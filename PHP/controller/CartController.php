<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .="/eShop-Project/PHP/database/database.php";
include_once($path);
class CartController
{
    protected $db;

    public function __construct()
    {
        $this->db= new Database;
        
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT c.cart_id as order_id, u.u_name as client_name, u.u_email as client_email,
                 p.p_code as pcode, p.p_name as title, cast(p.p_price as decimal(10,2)) as price,p.p_image as product_image,p.p_performance as p_performance
                  FROM cart c
                JOIN product p ON c.p_id = p.p_id
                JOIN users u ON c.user_id = u.u_id');

        return $query->fetchAll();
    }
    public function getByUser($user)
    {
        $query = $this->db->pdo->prepare('SELECT c.cart_id as order_id, u.u_name as client_name, u.u_email as client_email,
                 p.p_code as pcode, p.p_name as title, cast(p.p_price as decimal(10,2)) as price,p.p_image as product_image,p.p_performance as p_performance
                  FROM cart c
                JOIN product p ON c.p_id = p.p_id
                JOIN users u ON c.user_id = u.u_id
                where u.u_id=100');
                $query->bindParam(':id_u', $user);
                $query->execute();
            
        return $query->fetchAll(PDO::FETCH_BOTH);
    }

    public function store($user, $product)
    {
        $query = $this->db->pdo->prepare('INSERT INTO cart (c_product_id, c_user_id)
                                     VALUES (:product, :user)');
        $query->bindParam(':product', $product);
        $query->bindParam(':user', $user);
        $query->execute();
    }

    public function edit($cart_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM cart WHERE cart_id = :cart_id');
        $query->execute(['cart_id' => $cart_id]);

        return $query->fetch();
    }

    public function update($cart_id, $request)
    {

        $query = $this->db->pdo->prepare('UPDATE cart SET c_product_id = :c_product_id, c_user_id = :c_user_id WHERE cart_id = :cart_id');
        $query->execute([
            'c_product_id' => $request['c_product_id'],
            'c_user_id' => $request['c_user_id'],
            'cart_id' => $cart_id
        ]);

        return header('Location: cart.php');
    }

    public function destroy($cart_id)
    {
       
        $query = $this->db->pdo->prepare('DELETE FROM cart WHERE cart_id = :cart_id');
        $query->execute(['cart_id' => $cart_id]);
        return header('Location: ../cart.php');
        
    }
}