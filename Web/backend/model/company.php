<?php

  require_once(__DIR__.'/user.php');
  require_once(__DIR__.'/sector.php');

  /**
  * Company class
  */
  class Company extends User
  {

    private $company_name = "";
    private $cuit = "";
    private $phone = "";
    private $sector = "";
    private $id = 0;

    function __construct($username, $pass, $email, $address, $company_name, $cuit, $phone, $sector)
    {
      parent::__construct($username, $pass, $email, $address);
      $this->company_name = $company_name;
      $this->cuit = $cuit;
      $this->phone = $phone;
      $this->sector = $sector;
    }

    function setID($id) { $this->id = $id; }

    function getID() { return $this->id; }

    function getCompanyName() { return $this->company_name; }

    function getCUIT() { return $this->cuit; }

    function getPhone() { return $this->phone; }

    function getSector() { return $this->sector; }

    function userType() { return "company"; }

  }

?>
