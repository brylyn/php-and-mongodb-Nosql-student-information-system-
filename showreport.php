<?php
require_once('dbconn.php');

$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
$message ='';
if($flag){
  $message = $messages[$flag];
}
//$filter = ['x' => ['$gt' => 1]];
$filter = [];
$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('studentinfo.student', $query);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INFORMATION SYSTEM</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="ui/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="ui/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="ui/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="ui/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  
  <link href="ui/css/ui.css" rel="stylesheet" />
  <link href="ui/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />  
  <link href="ui/css/datepicker.css" rel="stylesheet" /> 
     <link href="ui/css/datatable/datatable.css" rel="stylesheet" />
     
    <script src="ui/js/jquery-1.10.2.js"></script> 
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
   <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
 
     <script src="ui/js/dataTable/jquery.dataTables.min.js"></script>
    
     
  
</head>
<body>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span href="home.php"><b>Back</b></span>
        </a>
                    <div class="col-md-20">
                        <h1 class="page-head-danger">Report  
            
            </h1>

                    </div>
                </div>
        
        
  
    
    

<div class="row" style="margin-bottom:20px;">
<div class="col-md-12">

</form>
</fieldset>

</div>
</div>
<?php
require_once('dbconn.php');
$id    =isset($_GET['id']);
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
?>


<div class="panel panel-default">
                        <div class="panel-heading">
                            <center>LIST OF STUDENT INFORMATION</center>  
                        </div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive" id="subjectresult">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        
                    <p>
                      <?php if($flag == 2 || $flag == 5){ ?>
                        <div class="error"><?php echo $message; ?></div>
                      <?php  } elseif($flag && $flag != 2 ){ ?>
                        <div class="success"><?php echo $message; ?></div>
                      <?php  } ?>
                    </p>
                    <table class='table table-bordered' style="width: 150%; height: 10%">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>Fullname</th>
                          <th>Age</th>
                          <th>Course</th>
                          <th>Gender</th>
                          <th>ID Number</th>
                          <th>Birthdate</th>
                          <th>Year/Level</th>
                          
                        
                        </tr>
                     </thead>
                                    <tbody>
                  <?php 
                    $i =1; 
                    foreach ($cursor as $document) { ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $document->fullname;?></td>
                        <td><?php echo $document->age;  ?></td>
                        <td><?php echo $document->course;?></td>
                        <td><?php echo $document->gender; ?></td>
                         <td><?php echo $document->idnum; ?></td>
                          <td><?php echo $document->birthdate; ?></td>
                          <td><?php echo $document->secyear; ?></td>
                       
                        </tr>
                    </tbody>
                   
                   <?php $i++;  
                    } 
                  ?>
                                </table>
                            </div>
                        </div>
                    </div>
                     
  
  <!-------->
          
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
                              
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script>
$(function(){
  $('.editlink').on('click', function(){
    var id = $(this).data('id');
    if(id){
      $.ajax({
          method: "GET",
          url: "record_ajax.php",
          data: { id: id}
        })
        .done(function( result ) {
          result = $.parseJSON(result);
          $('#fullname').val(result['fullname']);
          $('#age').val(result['age']);
          $('#course').val(result['course']);
          $('#gender').val(result['gender']);
          $('#idnum').val(result['idnum']);
          $('#birthdate').val(result['birthdate']);
          $('#secyear').val(result['secyear']);
          $('#id').val(result['id']);
          $('#btn').val('Update Records');
          $('#form1').attr('action', 'record_edit.php');
        });
      }
    });
});

</script>
                                    <tbody>
                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
    Magat Petshop booking system | Brought To You By : <a href="http://code-projects.org/" target="_blank">JUSTIEN MAGAT</a>
    </div>
   
  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>

    
</body>
</html>
