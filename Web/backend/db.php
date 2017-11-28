<?php

  require_once(__DIR__.'/model/company.php');
  require_once(__DIR__.'/model/person.php');

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
        return "dbfail";
      }

      $result_row = pg_fetch_array($result, null, PGSQL_ASSOC);
      if($result_row['pass'] == md5($pass)) {
        return "ok";
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
        $this->removeAddress();
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
      //DELETE address here
    }

    function removeUser($user_id) {
      //DELETE user here
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
        $this->removeUser();
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
        $this->removeUser();
        return false;
      }
      return true;
    }

  }

?>
