<?php
/**
 * ApplicablePost class
 */
class ApplicablePost extends Post
{

  private $user;
  private $cv_url;

  function __construct($post, $cv_url, $user)
  {
    parent::__construct(
      $post->getTitle(),
      $post->getID(),
      $post->getSalaryHigh(),
      $post->getSalaryLow(),
      $post->getCreationDate(),
      $post->getLocation(),
      $post->getRol(),
      $post->getXP(),
      $post->getSector(),
      $post->getTimeLoad(),
      $post->getDescription(),
      $post->getCompany()
    );
    if(substr($cv_url, 0, 4) != "http") {
      $this->cv_url = "http://".$cv_url;
    } else {
      $this->cv_url = $cv_url;
    }
    $this->user = $user;
  }

  function getUser() { return $this->user; }

  function getCV() { return $this->cv_url; }

}

?>
