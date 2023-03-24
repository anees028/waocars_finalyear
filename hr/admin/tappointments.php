<?php include 'includes/session.php'; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Attendance and Payroll System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
    <a href="home.php" class="logo" style="height: 70px; background-color: #222d32" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>HRM System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="height: 70px">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>

  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Appointments</li>
        <li class="active">Appointments List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="container">
  <div class="row">
    <div class="col-sm-4" >
      <?php
      $sql = "SELECT appointment_tbl.appoint_id, car_details.car_id, car_details.car_made, car_details.car_model, car_details.car_year, appointment_tbl.car_prob,appointment_tbl.prob_desc , appointment_tbl.appoint_date, appointment_tbl.appoint_time FROM appointment_tbl INNER JOIN car_details ON car_details.car_id=appointment_tbl.car_id ORDER BY appointment_tbl.appoint_id DESC";
      $query = $conn->query($sql);
      if($query->num_rows > 0){
        while ($row = $query->fetch_assoc()) {
          ?>
          <div class="card border-primary mb-3" style="max-width: 20rem; height: 250px">
  <div class="card-header">Appoint Id: <?php echo $row['appoint_id'];?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['car_prob'];?></h4>
    <p class="card-text">My car <?php echo $row['car_made'];?>&nbsp;<?php echo $row['car_model'];?>&nbsp;<?php echo $row['car_year'];?> has <?php echo $row['prob_desc'];?> problem</p>

    <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['appoint_id'];?>"><button type="submit" class="btn btn-danger float-right" name="btndel"><i class="fa fa-trash"></i></button>
</form>
    <!-- <button type="button" class="btn btn-primary">Appointment</button> -->
    <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['appoint_id'];?>"><button type="submit" style="margin-right: 10px" class="btn btn-warning float-right" name="apnview" value="Car items">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
   </button>
</form>

    
  </div>
</div>
          <?php
        }
      }

       ?>
        
    </div>
    <div class="col-sm-8">
      <form action="" method="post" style="padding-left: 25px; padding-top: 50px; padding-right: 25px; padding-bottom: 100px; background: #ECF0F5">
        <?php
        if (isset($_REQUEST['apnview'])) {
          $sql = "SELECT appointment_tbl.appoint_id, car_details.car_id, car_details.car_made, car_details.car_model, car_details.car_year, appointment_tbl.car_prob,appointment_tbl.prob_desc , appointment_tbl.appoint_date, appointment_tbl.appoint_time, users.username, users.email, users.address, users.phooneno, users.city, users.id, car_details.car_id FROM appointment_tbl INNER JOIN car_details ON car_details.car_id=appointment_tbl.car_id INNER JOIN users ON appointment_tbl.id=users.id WHERE appointment_tbl.appoint_id= {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
        
        if (isset($_REQUEST['btndel'])) {
          $sql = "DELETE FROM appointment_tbl WHERE appoint_id= {$_REQUEST['id']}";
          if ($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
          }
          else{
            echo "Unable to Delete";
          }
        }


         ?>
    
    <h2>Appointment Form</h2><br>
    <label>Appointment ID</label>
    <input type="text" class="form-control" name="apointi2" value="<?php if(isset($row['appoint_id'])) echo $row['appoint_id']; ?>" readonly><br>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label>Car Made</label>
        <input type="text" class="form-control" name="carmade2" value="<?php if(isset($row['car_made'])) echo $row['car_made']; ?>" readonly>
   </div>
   <div class="form-group col-md-4">
        <label>Car Model</label>
        <input type="text" class="form-control" name="carmodel2" value="<?php if(isset($row['car_model'])) echo $row['car_model']; ?>" readonly>
   </div>
   <div class="form-group col-md-4">
        <label>Car year</label>
        <input type="text" class="form-control" name="caryear2" value="<?php if(isset($row['car_year'])) echo $row['car_year']; ?>" readonly>
   </div>
</div>
    
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>User Name</label>
        <input type="text" class="form-control" name="uname2" value="<?php if(isset($row['username'])) echo $row['username']; ?>" readonly>
   </div>
   <div class="form-group col-md-6">
        <label>Email</label>
        <input type="text" class="form-control" name="uemail2" value="<?php if(isset($row['email'])) echo $row['email']; ?>" readonly>
   </div>
</div>
<label>Address</label>
  <input class="form-control" rows="3" name="uadress2" value="<?php if(isset($row['address'])) echo $row['address']; ?>" readonly><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Phone no</label>
        <input type="text" class="form-control" name="uphone2" value="<?php if(isset($row['phooneno'])) echo $row['phooneno']; ?>" readonly>
   </div>
   <div class="form-group col-md-6">
        <label>City</label>
        <input type="text" class="form-control" name="ucity2" value="<?php if(isset($row['city'])) echo $row['city']; ?>" readonly>
   </div>
</div>
<label>Car Problem</label>
  <!-- <input type="text" class="form-control" name="carprob" placeholder="Oil Leakage"> -->
  <input type="text" class="form-control" name="carprob2" value="<?php if(isset($row['car_prob'])) echo $row['car_prob']; ?>"><br>
  <label>Problem Description</label>
  <!-- <input type="text" class="form-control" name=""> -->
  <input class="form-control" rows="3" name="cprodesc2" value="<?php if(isset($row['prob_desc'])) echo $row['prob_desc']; ?>"><br>


  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Appointment Date</label>
        <input type="text" class="form-control" name="apntdate2" value="<?php if(isset($row['appoint_date'])) echo $row['appoint_date']; ?>" value="">
   </div>
   <div class="form-group col-md-6">
        <label>Appointment Time</label>
        <input type="text" class="form-control" name="apnttime2" value="<?php if(isset($row['appoint_time'])) echo $row['appoint_time']; ?>" value="">
   </div>
</div>
<label>Assign Shop</label>
<select class="form-control" name="asgnshop">
    <option value="Denting Shop">Denting Shop</option>
    <option value="Painting Shop">Painting Shop</option>
    <option value="Electrical Shop">Electrical Shop</option>
    <option value="Mechanical Shop">Mechanical Shop</option>
  </select>
<br>
<input type="hidden" name="uid2" value="<?php if(isset($row['id'])) echo $row['id']; ?>">
<input type="hidden" name="cid2" value="<?php if(isset($row['car_id'])) echo $row['car_id']; ?>">


    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnaprv">Approve Appointment</button>
        </div>
        
  </form>
  <?php
  if(isset($_REQUEST['btnaprv'])){
    if(($_REQUEST['apointi2'] =="") || ($_REQUEST['carmade2'] == "") || ($_REQUEST['carmodel2'] == "") || ($_REQUEST['caryear2'] == "") || ($_REQUEST['uname2'] == "") || ($_REQUEST['uemail2'] == "") || ($_REQUEST['uadress2'] == "") || ($_REQUEST['uphone2'] == "") || ($_REQUEST['ucity2'] == "") || ($_REQUEST['carprob2'] == "") || ($_REQUEST['cprodesc2'] == "") || ($_REQUEST['apntdate2'] == "") || ($_REQUEST['apnttime2'] == "") || ($_REQUEST['asgnshop'] == "") || ($_REQUEST['apointi2'] == "") ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else {

        $cr_made = $_REQUEST['carmade2'];
       $cr_modl = $_REQUEST['carmodel2'];
       $cr_year = $_REQUEST['caryear2'];
       $usr_name = $_REQUEST['uname2'];
       $usr_email = $_REQUEST['uemail2'];
       $usr_adress = $_REQUEST['uadress2'];
       $usr_phone = $_REQUEST['uphone2'];
       $usr_city = $_REQUEST['ucity2'];
       $cr_prp = $_REQUEST['carprob2'];
       $prp_desc = $_REQUEST['cprodesc2'];
       $apoint_dte = $_REQUEST['apntdate2'];
       $apoint_tme = $_REQUEST['apnttime2'];
       $assign_shop = $_REQUEST['asgnshop'];
       $usr_id = $_REQUEST['uid2'];
       $cr_id = $_REQUEST['cid2'];
       $create_datetime = date("Y-m-d H:i:s");
       $ap_id = $_REQUEST['apointi2'];
       


  
       $insert = "INSERT INTO `approved_apointment`(`cr_made`, `cr_mdl`, `cr_year`, `usr_nam`, `usr_emil`, `usr_adrs`, `usr_phn`, `usr_cty`, `cr_prob`, `cr_pdesc`, `ap_dte`, `ap_tme`, `shop_assign`, `id`, `car_id`, `apr_datetime`, `apoint_id`) VALUES ('$cr_made', '$cr_modl', '$cr_year' ,'$usr_name', '$usr_email', '$usr_adress', '$usr_phone', '$usr_city', '$cr_prp', '$prp_desc', '$apoint_dte', '$apoint_tme' , '$assign_shop', '$usr_id', '$cr_id', '$create_datetime', '$ap_id')";
  
       // if(mysqli_query($db,$insert))      //you can also use this instead of below 
       if($conn->query($insert) == TRUE)        
       {
        // $genid = mysqli_insert_id($con);
         echo "<script>alert('Appointment Approved Successfully')</script>";
         // $_SESSION['myid'] = $genid;
         echo "<script> location.href='tappointments.php'</script>";
       }
       else
       {
         echo "<script>alert('Appointmen could not Approved')</script>";
       }

    }
  }

   ?>

    </div>
    
  </div>
</div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#position_val').val(response.position_id).html(response.description);
      $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
