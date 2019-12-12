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
$cursor = $manager->executeQuery('studentinfo.admin', $query);

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">LOGIN</div>
      <div class="card-body">
<center><h1> ADMIN LOGIN</h1></center>
<div class="form-group">
		<div class="form-label-group">
<form action="confirm_admin.php" METHOD="POST">
<center><b><label for="">USERNAME</label></b></center>
<input type="text" Name="username"  class="form-control" required="required" autofocus="autofocus">
</div>
</div>
<div class="form-group">
	<center><b><label for="">PASSWORD</label></b></center>
		<div class="form-label-group">
<input type="password" Name="password"  class="form-control" required="required" autofocus="autofocus">
</div>
</div>
<center><b><label></label></b></center>
<input type="submit" a class="btn btn-success btn-block" value="Login">
</div>
</form>
</div
</div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>