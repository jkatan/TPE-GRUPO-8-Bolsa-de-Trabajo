<?php

require_once(__DIR__.'/address.php');

  /**
   * User class
   */
  abstract class User
  {

    private $username = "";
    private $email = "";
    private $pass = "";
    private $address = "";

    function __construct($username, $pass, $email, $address)
    {
      $this->username = strtolower($username);
      $this->pass = $pass;
      $this->email = $email;
      $this->address = $address;
    }

    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->pass; }
    public function getAddress() { return $this->address; }
  }

?>
