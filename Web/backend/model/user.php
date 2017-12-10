<?php

require_once(__DIR__.'/address.php');

  /**
   * User class
   */
  class User
  {

    private $username = "";
    private $email = "";
    private $pass = "";
    private $address = "";
    private $id = "";
    private $activated = false;

    function __construct($username, $pass, $email, $address, $id="")
    {
      $this->username = strtolower($username);
      $this->id = $id;
      $this->pass = $pass;
      $this->email = $email;
      $this->address = $address;
    }

    public function setID($id) { $this->id = $id; }
    public function getID() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->pass; }
    public function getAddress() { return $this->address; }
    public function userType() { return "user"; }
    public function activate() { $this->activated = true; }
    public function isActivated() { return $this->activated; }

  }

?>
