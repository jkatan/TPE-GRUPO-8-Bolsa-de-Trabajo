<?php

  /**
   *  Applicant  class
   */
  class Applicant
  {

    private $URL = "";
    private $post_id = 0;
    private $user_id = 0;

    function __construct($URL, $post_id, $user_id)
    {
      $this->URL = $URL;
      $this->post_id = $post_id;
      $this->user_id = $user_id;
    }

    function getURL() { return $this->URL; }

    function getPost() { return $this->post_id; }

    function getUser() { return $this->user_id; }

  }


?>
