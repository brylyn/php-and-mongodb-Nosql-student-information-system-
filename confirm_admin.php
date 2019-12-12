<?php

session_start();
include 'dbconn.php';

//$filter = ['x' => ['$gt' => 1]];
$filter = [];
$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('studentinfo.admin', $query);


$user=$_POST['username'];
$pass=$_POST['password'];


try {


$row          =  $cursor->toArray();
$usr          =  $row[0]->username;
$pas          =  $row[0]->password;

 $_SESSION['username']=$usr;
 $_SESSION['username']=$pas;

  
} catch ( MongoDB\Driver\Exception\Exception $e) {
  die("Error Ecountered: " . $e);

}

if ($usr==$user && $pas==$pass) {
 echo "<script type = \"text/javascript\">
                 alert(\"Successfully Log In.\");
                  window.location = (\"home.php\")
            </script>";   
}
else{

}
 
 echo "<script type = \"text/javascript\">
                      alert(\"Login Failed. Try Again\");
                      window.location = (\"index.php\")
                      </script>";


?>