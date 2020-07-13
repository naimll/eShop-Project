<?php
class Database
{
    private $servername = 'NAIM-PC\SQLEXPRESS';
    private $user = 'naja';
    private $password = 'naja123';
    private $databaseName = 'eShop';

    public $connection;
    public function __construct()
    {
        try {
            $connection = new PDO("sqlsrv:Server=$this->servername;Database=$this->databaseName", $this->user, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR ".$e.getMessage());
        }
        
    }
}



