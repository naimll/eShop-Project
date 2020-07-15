<?php


include_once './database/database.php';

class SliderController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
       
    }

    public function all()
    {
        $query = $this->db->pdo->query('SELECT * FROM slider');

        return $query->fetchAll();
    }

    public function store($request)
    {
        $query = $this->db->pdo->prepare('INSERT INTO slider (slider_image)
                                     VALUES (:slider_image)');
        $query->bindParam(':slider_image', $request['slider_image']);
        $query->execute();

        return header('Location: slider.php');
    }

    public function edit($slider_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM slider WHERE slider_id = :slider_id');
        $query->execute(['slider_id' => $slider_id]);

        return $query->fetch();
    }

    public function update($slider_id, $request)
    {

        $query = $this->db->pdo->prepare('UPDATE slider SET slider_image = :slider_image WHERE slider_id = :slider_id');
        $query->execute([
            'slider_image' => $request['slider_image'],
            'slider_id' => $slider_id
        ]);

        return header('Location: ../slider.php');
    }
    public function count(){
        $query=$this->db->pdo->prepare('select count(s_id) from slider');
        $query->execute();
        return $query->fetch();
    }
    public function destroy($slider_id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM slider WHERE slider_id = :slider_id');
        $query->execute(['slider_id' => $slider_id]);

        return header('Location: slider.php');
    }
}