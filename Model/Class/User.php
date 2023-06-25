<?php
class User {
    private $utilisateur_id;
    private $username;
    private $name;
    private $firstname;
    private $password;

      public function __construct($id, $username, $name, $firstname, $password)
    {
        $this->utilisateur_id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->password = $password;
    }


    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }


    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }


    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

 
    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
?>