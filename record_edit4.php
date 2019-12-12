<?php
  require_once('dbconn.php');
  $fullname   = '';
  $age        = 0;
  $course     = '';
  $gender     = '';
  $idnum      = 0;
  $birthdate  ='';
  $secyear  ='';
  $flag       = 0;
  if(isset($_POST['btn'])){
      $fullname   = $_POST['fullname'];
      $age        = $_POST['age'];
      $course     = $_POST['course'];
      $gender     = $_POST['gender'];
      $idnum      = $_POST['idnum'];
      $birthdate  = $_POST['birthdate'];
      $secyear  = $_POST['secyear'];
      $id         = $_POST['id'];

      if(!$fullname || !$age || !$course || !$gender || !$idnum || !$birthdate || !$secyear || !$id){
        $flag = 5;
      }else{
          $insRec       = new MongoDB\Driver\BulkWrite;
          $insRec->update(['_id'=>new MongoDB\BSON\ObjectID($id)],['$set' =>['fullname' =>$fullname, 'age'=>$age, 'course'=>$course, 'gender'=>$gender, 'idnum'=>$idnum,'birthdate'=>$birthdate, 'secyear' =>$secyear]], ['multi' => false, 'upsert' => false]);
          $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
          $result       = $manager->executeBulkWrite('studentinfo.student', $insRec, $writeConcern);
          if($result->getModifiedCount()){
            $flag = 3;
          }else{
            $flag = 2;
          }
      }
  }
  header("Location: record.php?flag=$flag");
  exit;
