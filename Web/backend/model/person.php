<?php

  require_once(__DIR__.'/user.php');

  /**
   * Person class
   */
  class Person extends User
  {

    private $fullname = "";
    private $surname = "";
    private $dni = "";
    private $birthdate = "";
    private $gender = "";

    function __construct($username, $pass, $email, $address, $fullname, $surname, $dni, $birthdate, $gender)
    {
      parent::__construct($username, $pass, $email, $address);
      $this->fullname = $fullname;
      $this->surname = $surname;
      $this->dni = $dni;
      $this->birthdate = $birthdate;
      $this->gender = $gender;
    }

    function getFullname() { return $this->fullname; }

    function getSurname() { return $this->surname; }

    function getDNI() { return $this->dni; }

    function getBirthdate() { return $this->birthdate; }

    function getGender() { return $this->gender; }

  }

?>
