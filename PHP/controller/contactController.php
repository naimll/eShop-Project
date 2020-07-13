<?php
include_once("../database/database.php");

class contactController
{

    protected $conn;

    public __construct()
    {
        $this->conn=new Database();
    }
    public function getAllContact()
    {
        $query=$this->db->pdo->query('SELECT * FROM contact');
        return $query->fetchAll();
    }
    public function insert
}