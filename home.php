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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Student Admin - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="home.php">STUDENT INFORMATION SYSTEM</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="index.php">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
       
        <div class="input-group-append">
           <a class="navbar-brand mr-1" href="home.php">Southern leyte State University</a>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="Login.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper" style="background-image: url('images/student.png')">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span href="index.php">Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Menu</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="showreport.php">Show report</a>
          <a class="dropdown-item" href="record.php">Update Records</a>
          <a class="dropdown-item" href="blank.php">About As</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="record.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        
            </ul>
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-body">
          <div class="personal-info col-sm-15">
              <h6>Input Records</h6>
                <thead>
                  <div class="table-responsive">
                   <table class="table">
                   <form id="form1" name='form1' action="record_add.php" method="post">
                   <input type='hidden' name='id' id='id' value="$id"/>
                   <table>
                    <tr>
                <div class="form-group col-sm-15">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" required>
              </div>
              <div class="form-group col-sm-15">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
              </div>
              <div class="form-group col-sm-15">
                <label>Select Course:</label>
                <select class="form-control" name='course' placeholder="Course">
                  <option value="BSOA">BSOA</option>
                  <option value="BSINFO">BSIT</option>
                  <option value="BSED">BSED</option>
                  <option value="BSINDUTECH">BSINDUTECH</option>
                </select>
              
              </div>
             <div class="form-group col-sm-15">
              <label>Select Gender</label>
              <input type = "text" name = "section" required = "required" value = "<?php echo $f_edit_student['section']?>" class = "form-control" />
              <select class="form-control" name='gender' required = "required" value = "<?php echo $f_edit_student['section']?>" class = "form-control" placeholder="gender"/>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group col-sm-15">
                <label for="idnum">ID Number</label>
                <input type="text" class="form-control" name="idnum" id="idnum" placeholder="17-20118" required>
              </div>
              <div class="form-group col-sm-15">
                <label for="birthdate">Birth date</label>
                <input type="Date" class="form-control" name="birthdate" id="birthdate" placeholder="Birth Date" required>
              </div>
              <div class="form-group col-sm-15">
              <label>Select Year-(level)</label>
              <select class="form-control" name='secyear' id="secyear" placeholder="YearLevel">
                  <option value="1ST">1ST</option>
                  <option value="2ND">2ND</option>
                  <option value="3RD">3RD</option>
                  <option value="4TH">4TH</option>
                </select>
              </div>

              </div>
              </div>

               <td><button type="submit"name='btn' id='btn' class="btn btn-primary btn-block">ADD</td>
                      </tr>
                    </table>
                       </form>

                    
                  </tbody>
                    </table>
            </div>
        </div>
        </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
    
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
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
          $('#id').val(result['id']);
          $('#btn').val('Update Records');
          $('#form1').attr('action', 'record_edit.php');
        });
      }
    });
});

</script>
</body>
</html>
