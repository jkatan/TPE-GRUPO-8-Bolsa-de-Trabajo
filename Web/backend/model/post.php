<?php

  /**
   * Post class
   */
  class Post
  {

    private $title = "";
    private $id = 0;
    private $salary_high = 0;
    private $salary_low = 0;
    private $creation_date = "";
    private $location_tags = "";
    private $rol_tags = "";
    private $xp_years = "";
    private $sector_id = "";
    private $timeload = "";
    private $short_desc = "";
    private $company_id = 0;

    function __construct($title, $id, $salary_high, $salary_low, $creation_date, $location_tags, $rol_tags, $xp_years, $sector_id, $timeload, $short_desc, $company_id)
    {
      $this->title = $title;
      $this->id = $id;
      $this->salary_high = $salary_high;
      $this->salary_low = $salary_low;
      $this->creation_date = $creation_date;
      $this->location_tags = $location_tags;
      $this->rol_tags = $rol_tags;
      $this->xp_years = $xp_years;
      $this->sector_id = $sector_id;
      $this->timeload = $timeload;
      $this->short_desc = $short_desc;
      $this->company_id = $company_id;
    }

    public function getTitle() { return $this->title; }

    public function getID() { return $this->id; }

    public function getSalaryHigh() { return $this->salary_high; }

    public function getSalaryLow() { return $this->salary_low; }

    public function getCreationDate() { return $this->creation_date; }

    public function getLocation() { return $this->location_tags; }

    public function getRol() { return $this->rol_tags; }

    public function getXP() { return $this->xp_years; }

    public function getSector() { return $this->sector_id; }

    public function getTimeLoad() { return $this->timeload; }

    public function getDescription() { return $this->short_desc; }

    public function getCompany() { return $this->company_id; }

  }

?>
