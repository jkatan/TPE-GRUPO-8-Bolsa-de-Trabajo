<?php

  require_once(__DIR__.'/model/company.php');
  require_once(__DIR__.'/model/person.php');
  require_once(__DIR__.'/model/post.php');
  require_once(__DIR__.'/model/applicablePost.php');
  require_once(__DIR__.'/model/applicant.php');

  /**
   * Singleton DB connection class
   */
  class DB
  {

    private $dbcon = null;
    private static $instance = null;

    private function __construct()
    {
      $this->dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
    }

    function __destruct() {
      pg_close($this->dbcon);
    }

    static function getInstance()
    {
      if (!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    function getSectors()
    {
      $array = array();
      $result = pg_query($this->dbcon, "SELECT * FROM sector ORDER BY name;");
      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        array_push($array, new Sector($row['name'], $row['id']));
      }
      return $array;
    }

    function getPosts($filters) {
      $array = array();
      if(isset($filters['latest'])) {
        $query = 'SELECT * FROM post ORDER BY creation_date DESC LIMIT $1;';
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array($filters['latest'])
        );
      } else if(isset($filters['company'])) {
        $query = 'SELECT * FROM post WHERE company_id=$1;';
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array($filters['company'])
        );
      } else if(isset($filters['keywords'])) {
        $query = 'SELECT * FROM post WHERE LOWER(title) LIKE $1;';
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array("%".strtolower($filters['keywords'])."%")
        );
      }

      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        array_push($array, new Post(
          $row['title'],
          $row['post_id'],
          $row['salary_high'],
          $row['salary_low'],
          $row['creation_date'],
          $row['location_tags'],
          $row['rol_tags'],
          $row['xp_years'],
          $row['sector_id'],
          $row['timeload'],
          $row['short_desc'],
          $row['company_id']
          ));
      }

      return $array;
    }

    function getUserApplications($user_id) {
      $array = array();
      $query = 'SELECT * FROM (post NATURAL JOIN applicant)
                  NATURAL JOIN _user WHERE user_id=$1;';
      $result = pg_query_params(
        $this->dbcon,
        $query,
        array($user_id)
      );

      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $aux_post = new Post(
          $row['title'],
          $row['post_id'],
          $row['salary_high'],
          $row['salary_low'],
          $row['creation_date'],
          $row['location_tags'],
          $row['rol_tags'],
          $row['xp_years'],
          $row['sector_id'],
          $row['timeload'],
          $row['short_desc'],
          $row['company_id']
        );
        $aux_user = new User (
          $row['username'],
          $row['pass'],
          $row['email'],
          $row['address_id'],
          $row['user_id']
        );
        array_push($array, new ApplicablePost(
          $aux_post,
          $row['cv_url'],
          $aux_user
        ));
      }

      return $array;
    }

    function getCompanyPosts($company_id) {
      $array = array();
      $query = 'SELECT * FROM (post NATURAL JOIN applicant)
                  NATURAL JOIN _user WHERE company_id=$1;';
      $result = pg_query_params(
        $this->dbcon,
        $query,
        array($company_id)
      );

      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $aux_post = new Post(
          $row['title'],
          $row['post_id'],
          $row['salary_high'],
          $row['salary_low'],
          $row['creation_date'],
          $row['location_tags'],
          $row['rol_tags'],
          $row['xp_years'],
          $row['sector_id'],
          $row['timeload'],
          $row['short_desc'],
          $row['company_id']
        );
        $aux_user = new User (
          $row['username'],
          $row['pass'],
          $row['email'],
          $row['address_id'],
          $row['user_id']
        );
        array_push($array, new ApplicablePost(
          $aux_post,
          $row['cv_url'],
          $aux_user
        ));
      }

      return $array;
    }

    function getPersonFromUser($user) {
      $query = 'SELECT * FROM person
                WHERE user_id=$1;';

      $result = pg_query_params(
        $this->dbcon,
        $query,
        array( strtolower($user->getID()) )
      );

      if($result == null) {
        return null;
      }

      if(pg_num_rows($result) < 1) {
        return null;
      }

      $result_row = pg_fetch_array($result, null, PGSQL_ASSOC);
      $ret = new Person (
        $user->getUsername(),
        $user->getPassword(),
        $user->getEmail(),
        $user->getAddress(),
        $result_row['fullname'],
        $result_row['surname'],
        $result_row['dni'],
        $result_row['birthdate'],
        $result_row['sex']
      );
      return $ret;
    }

    function isUserActivated($user) {
      $query = 'SELECT activated FROM _user WHERE username=$1;';
      if(is_string($user)) {
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array($user)
        );
      } else {
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array($user->getUsername())
        );
      }
      $result_row = pg_fetch_array($result, null, PGSQL_ASSOC);
      return $result_row[0];
    }

    function activateUser($user) {
      $query = 'UPDATE _user SET activated = true WHERE username=$1;';
      if(is_string($user)) {
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array($user)
        );
      } else {
        $result = pg_query_params(
          $this->dbcon,
          $query,
          array($user->getUsername())
        );
      }
      if($result != null) {
        return true;
      }
      return false;
    }

    function getCompanyFromUser($user) {
      $query = 'SELECT * FROM company
                WHERE user_id=$1;';

      $result = pg_query_params(
        $this->dbcon,
        $query,
        array( strtolower($user->getID()) )
      );

      if($result == null) {
        return null;
      }

      if(pg_num_rows($result) < 1) {
        return null;
      }

      $result_row = pg_fetch_array($result, null, PGSQL_ASSOC);
      $ret = new Company (
        $user->getUsername(),
        $user->getPassword(),
        $user->getEmail(),
        $user->getAddress(),
        $result_row['company_name'],
        $result_row['cuit'],
        $result_row['phone'],
        $result_row['sector_id']
      );
      return $ret;
    }

    function checkLogin($user, $pass)
    {
      $query = 'SELECT * FROM _user
                WHERE username=$1;';

      $result = pg_query_params(
        $this->dbcon,
        $query,
        array( strtolower($user) )
      );

      if($result == null) {
        return "fail";
      }

      $result_row = pg_fetch_array($result, null, PGSQL_ASSOC);
      $userobj = new User (
        $result_row['username'],
        $result_row['pass'],
        $result_row['email'],
        $result_row['address_id'],
        $result_row['user_id']
      );
      if($result_row['pass'] == md5($pass)) {
        if($person = $this->getPersonFromUser($userobj)) {
          $person->setID($result_row['user_id']);
          if($result_row['activated'] != "f") {
            $person->activate();
            error_log("User is activated!");
          }
          return $person;
        } else if ($company = $this->getCompanyFromUser($userobj)) {
          $company->setID($result_row['user_id']);
          if($result_row['activated'] != "f") {
            $company->activate();
            error_log("User is activated!");
          }
          return $company;
        } else {
          return "fail";
        }
      }
      else {
        return "fail";
      }
    }

    function addUser($user)
    {

      $address_id = $this->addAddress($user->getAddress());
      if($address_id == null) {
        return null;
      }

      $query = 'INSERT INTO
                  _user(email, username, pass, address_id)
                VALUES
                  ($1, $2, $3, $4)
                RETURNING user_id;';

      $result = pg_query_params (
        $this->dbcon,
        $query,
        array
        (
            $user->getEmail(),
            $user->getUsername(),
            md5($user->getPassword()),
            $address_id
        )
      );
      if($result == null) {
        $this->removeAddress($address_id);
        return null;
      }
      $result_row = pg_fetch_array($result, 0, PGSQL_NUM);
      return $result_row[0];
    }

    function addAddress($address)
    {
      $query = 'INSERT INTO
                  address(address, city, _state, country, cp)
                VALUES
                  ($1, $2, $3, $4, $5)
                RETURNING address_id;';

      $result = pg_query_params (
        $this->dbcon,
        $query,
        array
        (
            $address->getAddress(),
            $address->getCity(),
            $address->getState(),
            $address->getCountry(),
            $address->getCP()
        )
      );
      if($result == null) {
        return null;
      }
      $result_row = pg_fetch_array($result, 0, PGSQL_NUM);
      return $result_row[0];
    }

    function removeAddress($address_id) {
      pg_query($this->dbcon, "DELETE FROM address WHERE address_id=".$address_id.";");
    }

    function removeUser($user_id) {
      $result = pg_query($this->dbcon, "SELECT address_id FROM _user WHERE user_id=".$user_id.";");
      $result_row = pg_fetch_array($result, 0, PGSQL_NUM);
      $this->removeAddress($result_row[0]);
      pg_query($this->dbcon, "DELETE FROM _user WHERE user_id=".$user_id.";");
    }

    function addPerson($person)
    {

      $user_id = $this->addUser($person);
      if($user_id == null) {
        return null;
      }

      $query = 'INSERT INTO
                  person(user_id,dni,fullname,surname,birthdate,sex)
                VALUES
                  ($1, $2, $3, $4, $5, $6);';

      $result = pg_query_params (
        $this->dbcon,
        $query,
        array
        (
            $user_id,
            $person->getDNI(),
            $person->getFullname(),
            $person->getSurname(),
            $person->getBirthdate(),
            $person->getGender()
        )
      );
      if($result == null) {
        $this->removeUser($user_id);
        return false;
      }
      return true;
    }

    function addCompany($company)
    {

      $user_id = $this->addUser($company);
      if($user_id == null) {
        return null;
      }

      $query = 'INSERT INTO
                  company(user_id,cuit,phone,company_name,sector_id)
                VALUES
                  ($1, $2, $3, $4, $5);';

      $result = pg_query_params (
        $this->dbcon,
        $query,
        array
        (
            $user_id,
            $company->getCUIT(),
            $company->getPhone(),
            $company->getCompanyName(),
            $company->getSector()
        )
      );
      if($result == null) {
        $this->removeUser($user_id);
        return false;
      }
      return true;
    }

    function addPost($post)
    {
      $query = 'INSERT INTO post(title,location_tags,rol_tags,xp_years,sector_id,timeload,salary_high,salary_low,short_desc,company_id)
      VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10);';

      $result = pg_query_params (
        $this->dbcon,
        $query,
        array
        (
            $post->getTitle(),
            $post->getLocation(),
            $post->getRol(),
            $post->getXP(),
            $post->getSector(),
            $post->getTimeLoad(),
            $post->getSalaryHigh(),
            $post->getSalaryLow(),
            $post->getDescription(),
            $post->getCompany()
        )
      );
      if($result == null) {
        return false;
      }
      return true;
    }
    function getPostById($id){
      $array = array();
      $query = 'SELECT * FROM post WHERE company_id = ' . $id;

      $mysqli = openConectionDB();
      $stmt = $mysqli->prepare($query);
      $stmt->execute();

      $stmt->bind_result($post_id, $creation_date, $title, $location_tags, $rol_tags, $xp_years, $sector_id, $timeload, $salary_high, $salary_low, $short_desc, $company_id);
      while($stmt->fetch()) {
        array_push($array, new Post($title, $post_id, $salary_high, $salary_low, $creation_date, $location_tags, $rol_tags, $xp_years, $sector_id, $timeload, $short_desc, $company_id));
      }
      $stmt->close();
      $mysqli->close();

      return $array;
    }

    function addApplicant($applicant){

      $query = 'INSERT INTO applicant(post_id, user_id, cv_url) VALUES ($1,$2,$3);';

      $result = pg_query_params(
        $this->dbcon,
        $query,
        array(
          $applicant->getPost(),
          $applicant->getUser(),
          $applicant->getURL()
      ));

      if($result != null) {
        return true;
      }

      return false;
    }

    function getPostByFilters($query){

      $array = array();
      $result = pg_query($this->dbcon, $query);
      while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        array_push($array, new Post($row['title'], $row['$post_id'], $row['salary_high'], $row['salary_low'], $row['creation_date'], $row['location_tags'], $row['rol_tags'], $row['xp_years'], $row['sector_id'], $row['timeload'],
        $row['short_desc'], $row['company_id']));
      }
      return $array;

    }
  }


?>
