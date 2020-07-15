<?php
class Database
{
    private $servername = 'NAIM-PC\SQLEXPRESS';
    private $user = 'naja';
    private $password = 'naja123';
    private $databaseName = 'eShop';

    public $pdo;
  
    public function __construct()
    {
        
        try {
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            $link = new PDO("sqlsrv:Server=$this->servername;Database=$this->databaseName", $this->user, $this->password);
            $this->pdo=$link;
        } catch (PDOException $e) {
            die("ERROR ".$e.getMessage());
            
        }
        
    }
}



