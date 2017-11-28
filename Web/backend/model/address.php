<?php

  /**
   * Address class
   */
  class Address
  {

    private $address = "";
    private $city = "";
    private $state = "";
    private $country = "";
    private $cp = "";

    function __construct($address, $city, $state, $country, $cp)
    {
      $this->address = $address;
      $this->city = $city;
      $this->state = $state;
      $this->country = $country;
      $this->cp = $cp;
    }

    function getAddress() { return $this->address; }

    function getCity() { return $this->city; }

    function getState() { return $this->state; }

    function getCountry() { return $this->country; }

    function getCP() { return $this->cp; }

  }


?>
