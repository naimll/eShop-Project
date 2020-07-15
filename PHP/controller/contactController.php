<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/eShop-Project/PHP/database/database.php';
include_once($path);

$path1 = $_SERVER['DOCUMENT_ROOT'];
$path1 .= '/eShop-Project/PHP/model/contactModel.php';
include_once($path1);
class contactController
{

    protected $obj;
    private $contact;

    public function __construct()
    {
        $this->obj=new Database();
       
    }
    
   
    public function getAllContact()
    {
        $query=$this->obj->pdo->query('SELECT * FROM contact');
        return $query->fetchAll();
    }
    public function create(Contact $Con)
    {
        $sql = "INSERT INTO contact (c_name,c_lastname,c_email,c_message,c_country,c_age) VALUES (:firstname,:lastname,:email,:Cmessage,:country,:age)";
        $this->contact=$Con;
        $nameC=$this->contact->getName();
        $lastnameC=$this->contact->getLastName();
        $emailC=$this->contact->getEmail();
        $messageC=$this->contact->getMessage();
        $countryC=$this->contact->getCountry();
        $ageC=$this->contact->getAge();

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(":firstname",$nameC);
        $statement->bindParam(":lastname", $lastnameC);
        $statement->bindParam(":email", $emailC);
        $statement->bindParam(":Cmessage", $messageC);
        $statement->bindParam(":country", $countryC);
        $statement->bindParam(":age", $ageC);

        $statement->execute();
       
    }
    public function delete()
    {
        $sql="DELETE FROM contact WHERE c_name = :name";
        $statement=$this->conn->pdo->prepare($sql);
        $statement->bindParam(":name",$this->Contact->getName());
        $statement->execute();
    }
    
    public function destroy($id)
    {
        $query = $this->obj->pdo->prepare('DELETE FROM contact WHERE c_id = :id');
        $query->execute(['id' => $id]);

        return header('Location: contacts.php');
    }
    
}