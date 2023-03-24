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
  <title>Approved Appointments Full detail</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <?php 
        
$sql = "SELECT * FROM `approved_apointment` WHERE ap_id = {$_REQUEST['id']}";
$result = $con->query($sql);
// if($result->num_rows == 1){
// if ($result !== false && $result->num_rows > 0){
if ( !empty($result->num_rows) && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<div class='ml-5 mt-5' style='padding-left: 100px; padding-top: 20px; padding-right: 300px; padding-bottom:100px'>
  <h1>Approved Appointment User Full Details</h1><br>
    <table class='table'>
      <tbody>
        <tr>
          <th>Appointment ID</th>
          <td>".$row['ap_id']."</td>
        </tr>
        <tr>
          <th>Car</th>
          <td>". $row['cr_made']."&nbsp;". $row['cr_mdl']."&nbsp;". $row['cr_year']."</td>
        </tr>
        <tr>
          <th>User Name</th>
          <td>".$row['usr_nam']."</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>".$row['usr_emil']."</td>
        </tr>
        <tr>
          <th>Address</th>
          <td>".$row['usr_adrs']."</td>
        </tr>
        <tr>
          <th>Phone no</th>
          <td>".$row['usr_phn']."</td>
        </tr>
        <tr>
          <th>City</th>
          <td>".$row['usr_cty']."</td>
        </tr>
        <tr>
          <th>Car Problem</th>
          <td>".$row['cr_prob']."</td>
        </tr>
        <tr>
          <th>Problem Description</th>
          <td>".$row['cr_pdesc']."</td>
        </tr>
        <tr>
          <th>Appointment Time</th>
          <td>".$row['ap_tme']."</td>
        </tr>
        <tr>
          <th>Appointment Date</th>
          <td>".$row['ap_dte']."</td>
        </tr>
        <tr>
          <th>Shop Assigned</th>
          <td>".$row['shop_assign']."</td>
        </tr>
        <tr>
          <th>Appointment Approved at</th>
          <td>".$row['apr_datetime']."</td>
        </tr>
      </tbody>
    </table>
  </div>";
}
  ?>
    
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>