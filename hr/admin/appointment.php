<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Appointments</li>
        <!-- <li class="active">Employee List</li> -->
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
<!--       Front End Code here.... -->
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <!-- <?php
          $sql = "SELECT appointment_tbl.appoint_id, car_details.car_id, car_details.car_made, car_details.car_model, car_details.car_year, appointment_tbl.car_prob,appointment_tbl.prob_desc , appointment_tbl.appoint_date, appointment_tbl.appoint_time FROM appointment_tbl INNER JOIN car_details ON car_details.car_id=appointment_tbl.car_id ORDER BY appointment_tbl.appoint_id DESC";
          $query = $conn->query($sql);
          if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()) {
              echo '<div class="card ">';
              echo '<div class="card-header">';
              echo 'Appointment ID:'.$row['appoint_id'];
              echo '</div class="card-body">';
              echo '<h5 class="card-title">Car: '.$row['car_made'];
              echo '<p class="card-text">'.$row['appoint_id'];
              echo '</p>';
              echo '<p class="card-text">Appointment Date And Time'.$row['appoint_date'];
              echo '</p>';
              echo '</div>';
              echo '</div>';
            }
          }
        ?> -->
          <div class="card w-75 mt-5 mx-5" style="border: 1px solid black">
            <div class="card-header">Appointment Detail</div>
            <div class="card-body">
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        <div class="col-sm-7" style="background-color: #989898">
          <div class="">
            <h2 style="text-align: center;">Appointment Details</h2><br>
            <form>
              <div class="form-control">
                <label >Request ID:</label>
                <input type="text" name="requestId" placeholder="..." />
              </div>
              <div class="form-control">
                <label >Request Info:</label>
                <input type="text" name="requestId" placeholder="..." />
              </div>
              <div class="form-control">
                <label >Description :</label>
                <input type="text" name="requestId" placeholder="..." />
              </div>
              <div class="form-control">
                <label >City :</label>
                <input type="text" name="requestId" placeholder="..." />
              </div>
              <div class="form-control">
                <label >Email :</label>
                <input type="text" name="requestId" placeholder="..." />
              </div>
              <div class="form-control">
                <label >Mobile No :</label>
                <input type="text" name="requestId" placeholder="..." />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

      </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<script>
// $(function(){
//   $('.edit').click(function(e){
//     e.preventDefault();
//     $('#edit').modal('show');
//     var id = $(this).data('id');
//     getRow(id);
//   });

//   $('.delete').click(function(e){
//     e.preventDefault();
//     $('#delete').modal('show');
//     var id = $(this).data('id');
//     getRow(id);
//   });

//   $('.photo').click(function(e){
//     e.preventDefault();
//     var id = $(this).data('id');
//     getRow(id);
//   });

// });

// function getRow(id){
  
//   $.ajax({
//     type: 'POST',
//     url: 'employee_row.php',
//     data: {id:id},
//     dataType: 'json',
//     success: function(response){
//       $('.empid').val(response.empid);
//       $('.employee_id').html(response.employee_id);
//       $('.del_employee_name').html(response.firstname+' '+response.lastname);
//       $('#employee_name').html(response.firstname+' '+response.lastname);
//       $('#edit_firstname').val(response.firstname);
//       $('#edit_lastname').val(response.lastname);
//       $('#edit_address').val(response.address);
//       $('#datepicker_edit').val(response.birthdate);
//       $('#edit_contact').val(response.contact_info);
//       $('#gender_val').val(response.gender).html(response.gender);
//       $('#position_val').val(response.position_id).html(response.description);
//       $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
//     }
//   });
// }
</script>
</body>
</html>