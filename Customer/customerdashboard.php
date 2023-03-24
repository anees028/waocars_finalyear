<?php
       include('db.php');
       include("auth_session.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Customer Dashboard</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>
    <div class="container" style="margin-top: 50px; padding-bottom: 100px">
      <div class="row">
    <div class="col">
      <center><h1>Customer Dashboard</h1></center>
    </div>
  </div><br>
  <div class="row">
    <div class="col">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
  <div class="card-header">Pending Appointments</div>
  <div class="card-body">
    <center><h1 class="card-title">
      <?php
      $usertest = $_SESSION["username"];
        // echo $usertest;
        $sql = "SELECT * FROM users WHERE username='$usertest'";
        $result = mysqli_query($con,$sql);        
        // print_r($result);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["username"]. "Email: " . $row["email"]. "<br>";
        $id=$row["id"];
        }
        } else {
         echo "0 results";
         }

      $query = "SELECT COUNT(appoint_id) AS count FROM appointment_tbl WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Appointments</p></center>
  </div>
</div>
</div>

<div class="col">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
  <div class="card-header"><?php echo $_SESSION['username'];?>'s Cars</div>
  <div class="card-body">
    <center><h1 class="card-title" style="color: white">
      <?php
      

      $query = "SELECT COUNT(car_id) AS count FROM car_details WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Cars</p></center>
  </div>
</div>
</div>

<div class="col">
    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Approved Appointments</div>
  <div class="card-body">
    <center><h1 class="card-title">
      <?php
      $query = "SELECT COUNT(ap_id) AS count FROM approved_apointment WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Approved Appointment</p></center>
  </div>
</div>
</div>
</div>

<div class="row">
    <div class="col"><br><br>
      <h2>Appointments</h2>
    </div>
  </div>
    
    <div class="row">
    <div class="col">
    <table class="table" style="margin-top: 50px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Car</th>
      <th scope="col">Car Problem</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Appointment created</th>
    </tr>
  </thead>
    <?php

    
    // $select = "SELECT * FROM appointment_tbl WHERE id='$id'";
    $select = "SELECT appointment_tbl.appoint_id, car_details.car_id, car_details.car_made, car_details.car_model, car_details.car_year, appointment_tbl.car_prob, appointment_tbl.appoint_date, appointment_tbl.appoint_time, appointment_tbl.appoin_created FROM appointment_tbl INNER JOIN car_details ON car_details.car_id=appointment_tbl.car_id WHERE appointment_tbl.id = '$id' ORDER BY appointment_tbl.appoint_id DESC";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['appoint_id']."</td>";
      echo "<td>". $row['car_made']."&nbsp;". $row['car_model']."&nbsp;". $row['car_year']."</td>";
      echo "<td>". $row['car_prob']."</td>";
      echo "<td>". $row['appoint_date']."</td>";
      echo "<td>". $row['appoint_time']."</td>";
      echo "<td>". $row['appoin_created']."</td>";
      
    }
    
    ?>
  
  </table>
</div>
</div>
 <br><br>
 <div class="row">
    <div class="col"><br><br>
      <h2>Approved Appointments</h2>
    </div>
  </div>
    
    <div class="row">
    <div class="col">
    <table class="table" style="margin-top: 50px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Car</th>
      <th scope="col">Car Problem</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Date created</th>
    </tr>
  </thead>
    <?php

    
    // $select = "SELECT * FROM appointment_tbl WHERE id='$id'";
    $select = "SELECT * FROM `approved_apointment` WHERE id = '$id' ORDER BY ap_id DESC";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['apoint_id']."</td>";
      echo "<td>". $row['cr_made']."&nbsp;". $row['cr_mdl']."&nbsp;". $row['cr_year']."</td>";
      echo "<td>". $row['cr_prob']."</td>";
      echo "<td>". $row['ap_dte']."</td>";
      echo "<td>". $row['ap_tme']."</td>";
      echo "<td>". $row['apr_datetime']."</td>";
    }
    mysqli_close($con);
    ?>
  
  </table>
</div>
</div>





</div>
  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>