<?php

class Contact
{
    private $name;
    private $lastname;
    private $email;
    private $message;
    private $country;
    private $age;

    public function __construct($name,$lastname,$email,$message,$country,$age)
    {
        $this->name=$name;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->message=$message;
        $this->country=$country;
        $this->age=$age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getLastName()
    {
        return $this->lastname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setLastName($lastname)
    {
        $this->lastName = $lastname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }

}