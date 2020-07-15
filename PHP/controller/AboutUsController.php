<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/eShop-Project/PHP/database/database.php';
include_once($path);

class AboutUsController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM aboutus');

        return $query->fetchAll();
    }
    public function edit($aboutus_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM aboutus WHERE a_id = :aboutus_id');
        $query->execute(['aboutus_id' => $aboutus_id]);

        return $query->fetch();
    }

    public function getById($aboutus_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM aboutus WHERE a_id = :aboutus_id');
        $query->execute(['aboutus_id' => $aboutus_id]);

        return $query->fetch();
    }

    public function update($aboutus_id, $request)
    {

        $query = $this->db->pdo->prepare('UPDATE aboutus SET a_welcome = :Welcome,a_description = :Desc, a_message = :Message
                                            WHERE a_id = :aboutus_id');
        $query->execute([
            'Welcome' => $request['welcome'],
            'Desc' => $request['desc'],
            'Message' => $request['message'],
            'aboutus_id' => $aboutus_id
        ]);

       
    }
}
