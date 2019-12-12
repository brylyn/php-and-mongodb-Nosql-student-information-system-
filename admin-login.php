<?php
require_once('admin.php');

$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
$message ='';
if($flag){
  $message = $messages[$flag];
}
$filter = [];
$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('mypetshop.admin', $query);

?>
<html>
<head>
</head>


<body>
<br>
<center><h1> ADMIN LOGIN</h1></center>
<br>
<form action="confirm_admin.php" METHOD="POST">
<label>Username :</label>
<input type="text" Name="username">
<br>
<label>Password :</label>
<input type="password" Name="password">
<br>
<br>
<input type="submit" value="Login">
<br>
</FORM>
</body>
</html>