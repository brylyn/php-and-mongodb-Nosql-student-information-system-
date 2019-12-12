<?php
require_once('dbconn.php');
$id    = $_GET['id'];
$result = array();
if($id){
  $filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
  $options = [
   'projection' => ['_id' => 0],
];
  $query = new MongoDB\Driver\Query($filter,$options);
  $cursor = $manager->executeQuery('studentinfo.student', $query);
  foreach($cursor as $row){
    $result ['fullname']   = $row->fullname;
    $result ['age']        = $row->age;
    $result ['course']     = $row->course;
    $result ['gender']     = $row->gender;
    $result ['idnum']      = $row->idnum;
    $result ['birthdate']  = $row->birthdate;
    $result ['secyear']  = $row->secyear;
    $result ['id']         = $id;
  }
  echo json_encode($result);
}
