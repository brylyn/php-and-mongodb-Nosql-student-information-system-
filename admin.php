<?php
ini_set('display_errors','false');
error_reporting(E_ALL);

$messages = array(
	1=>'Error occured. Please try again.', 
	2=>'Admin Login successfully.');
    
$mongoDbname  = 'studentinfo';
$mongoTblName =  'admin';
$manager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");
  ?>