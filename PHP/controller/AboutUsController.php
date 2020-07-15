<?php

include_once './database/database.php';

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

    public function getById($aboutus_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM aboutus WHERE a_id = :aboutus_id');
        $query->execute(['aboutus_id' => $aboutus_id]);

        return $query->fetch();
    }

    public function update($aboutus_id, $request)
    {

        $query = $this->db->pdo->prepare('UPDATE about_us SET Welcome = :Welcome, MZV = :MZV, Misioni = :Misioni, Vizioni = :Vizioni, Vlerat = :Vlerat
                                            WHERE aboutus_id = :aboutus_id');
        $query->execute([
            'Welcome' => $request['Welcome'],
            'MZV' => $request['MZV'],
            'Misioni' => $request['Misioni'],
            'Vizioni' => $request['Vizioni'],
            'Vlerat' => $request['Vlerat'],
            'aboutus_id' => $aboutus_id
        ]);

        return header('Location: ./../aboutus.php');
    }
}
