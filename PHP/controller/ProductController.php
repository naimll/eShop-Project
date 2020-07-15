<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/eShop-Project/PHP/database/database.php';
include_once($path);

class ProductController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT p.p_id as id, p.p_name as name, p.p_code as code,
        cast(p.p_price as decimal(10,2))as price,p.p_description as description, p.p_performance as performance, p.p_image as image
        FROM product p');

        return $query->fetchAll();
    }

    
    public function getProducts()
    {
        $query = $this->db->pdo->query('SELECT p.p_id ,p.p_name,p.p_description, p.p_performance,p.p_image,cast(p.p_price as decimal(10,2)) as p_price,p.p_code
          from product p');

        return $query->fetchAll();
    }

    public function edit($product_id)
    {
        $query = $this->db->pdo->prepare('SELECT p.p_id as product_id, p.p_name as product_name, p.p_code as product_code,
                                cast(p.p_price as decimal(10,2)) as product_price,p.p_description as product_description,
                               p.p_performance as product_performance,p.p_image as product_image
                                        FROM product p
                                        WHERE p.p_id = :product_id');

        $query->execute(['product_id' => $product_id]);

        return $query->fetch();
    }

    public function store( $request)
    {
        $query = $this->db->pdo->prepare('INSERT INTO product (p_name, p_description, p_performance,p_image,p_price,p_code)                        
                                     VALUES (:product_name, :product_description,:product_performance,:product_image,:product_price,:product_code)');
                                            
        $query->bindParam(':product_name', $request['product_name']);
        $query->bindParam(':product_description', $request['product_description']);
        $query->bindParam(':product_performance', $request['product_performance']);
        $query->bindParam(':product_image', $request['product_image']);
        $query->bindParam(':product_price', $request['product_price']);
        $query->bindParam(':product_code', $request['product_code']);
        $query->execute();

      
    }

    public function update($product_id, $request)
    {

        $query = $this->db->pdo->prepare('UPDATE product SET p_name = :product_name, p_code = :product_code
                                , p_price = :product_price, p_performance = :product_performance
                                , p_description = :product_description, p_image = :product_image
                                 WHERE p_id= :product_id');
        $query->execute([
            'product_name' => $request['product_name'],
            'product_code' => $request['product_code'],
            'product_price' => $request['product_price'],
            'product_performance' => $request['product_performance'],
            'product_description' => $request['product_description'],
            'product_image' => $request['product_image'],
            'product_id' => $product_id
        ]);

        // return header('Location: ../products.php');
    }

    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM product WHERE p_id = :id');
        $query->execute(['id' => $id]);

        //  return header('Location: products.php');
    }
}
