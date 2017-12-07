<?php

  require_once(__DIR__.'/db.php');
  require_once(__DIR__.'/session.php');

  function insertCompanyFromPOST($POST)
  {
    if(companyPOSTDataCheck($POST)) {
      $result = DB::getInstance()->addCompany(
        new Company (
          $POST['username'],
          $POST['pass'],
          $POST['email'],
          new Address (
            $POST['address'],
            $POST['city'],
            $POST['state'],
            $POST['country'],
            $POST['cp']
          ),
          $POST['companyname'],
          $POST['cuit'],
          $POST['phone'],
          $POST['sector']
        )
      );
    } else {
      $result = false;
    }
    return $result;
  }

  function insertPersonFromPOST($POST)
  {
    if(personPOSTDataCheck($POST)) {
      $result = DB::getInstance()->addPerson(
        new Person (
          $POST['username'],
          $POST['pass'],
          $POST['email'],
          new Address (
            $POST['address'],
            $POST['city'],
            $POST['state'],
            $POST['country'],
            $POST['cp']
          ),
          $POST['fullname'],
          $POST['surname'],
          $POST['dni'],
          $POST['birthdate_year'].'-'.$POST['birthdate_month'].'-'.$POST['birthdate_day'],
          $POST['gender']
        )
      );
    } else {
      $result = false;
    }
    return $result;
  }

  function insertPostFromPOST($POST)
  {
    if(newPostPOSTDataCheck($POST)) {
      $result = DB::getInstance()->addPost(
        new Post (
            $POST['title'],
            "",
            $POST['salary_high'],
            $POST['salary_low'],
            "",
            $POST['location_tags'],
            $POST['rol_tags'],
            $POST['xp_years'],
            $POST['sector'],
            $POST['timeload'],
            $POST['short_desc'],
            Session::getInstance()->user->getCUIT()
          )
      );
    } else {
      $result = false;
    }
    return $result;
  }

  function companyPOSTDataCheck($POST) {
    if($POST['register']!="Registrar") { echo 'error registrar'; return false; }
    if($POST['companyname']=="") { echo 'error companyname'; return false; }
    if($POST['cuit']=="") { echo 'error cuit'; return false; }
    if($POST['address']=="") { echo 'error address'; return false; }
    if($POST['city']=="") { echo 'error city'; return false; }
    if($POST['state']=="") { echo 'error state'; return false; }
    if($POST['country']=="") { echo 'error country'; return false; }
    if($POST['cp']=="") { echo 'error cp'; return false; }
    if($POST['phone']=="") { echo 'error phone'; return false; }
    if($POST['username']=="") { echo 'error username'; return false; }
    if($POST['pass']=="") { echo 'error pass'; return false; }
    if($POST['pass']!=$POST['pass2']) { echo 'error pass2'; return false; }
    if($POST['email']=="") { echo 'error email'; return false; }
    if($POST['terms']!="accept") { echo 'error terms'; return false; }
    return true;
  }

  function personPOSTDataCheck($POST) {
    if($POST['register']!="Registrar") { echo 'error registrar'; return false; }
    if($POST['fullname']=="") { echo 'error fullname'; return false; }
    if($POST['surname']=="") { echo 'error surname'; return false; }
    if($POST['dni']=="") { echo 'error dni'; return false; }
    if($POST['address']=="") { echo 'error address'; return false; }
    if($POST['city']=="") { echo 'error city'; return false; }
    if($POST['state']=="") { echo 'error state'; return false; }
    if($POST['country']=="") { echo 'error country'; return false; }
    if($POST['cp']=="") { echo 'error cp'; return false; }
    if($POST['username']=="") { echo 'error username'; return false; }
    if($POST['pass']=="") { echo 'error pass'; return false; }
    if($POST['pass']!=$POST['pass2']) { echo 'error pass2'; return false; }
    if($POST['email']=="") { echo 'error email'; return false; }
    if($POST['terms']!="accept") { echo 'error terms'; return false; }
    return true;
  }

  function newPostPOSTDataCheck($POST) {
    if($POST['createPost']!="Crear Post") {/*  echo 'error crear post';*/  return false; }
    if($POST['title']=="") { /* echo 'error companyname';*/  return false; }
    if($POST['location_tags']=="") { /* echo 'error cuit'; */ return false; }
    if($POST['rol_tags']=="") { /* echo 'error address'; */ return false; }
    if($POST['xp_years']=="") { /* echo 'error city';*/  return false; }
    if($POST['timeload']=="") { /* echo 'error state'; */ return false; }
    if($POST['salary_high']=="") { /* echo 'error country';*/  return false; }
    if($POST['salary_low']=="") { /* echo 'error cp';*/  return false; }
    if($POST['short_desc']=="") { /* echo 'error phone'; */ return false; }
    return true;
  }
?>
