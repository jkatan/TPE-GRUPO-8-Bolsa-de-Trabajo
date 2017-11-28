<?php

  /**
   * Sector class
   */
  class Sector
  {

    private $name = "";
    private $id = 0;

    function __construct($name, $id)
    {
      $this->name = $name;
      $this->id = $id;
    }

    function getName() { return $this->name; }
    
    function getID() { return $this->id; }

  }


?>
