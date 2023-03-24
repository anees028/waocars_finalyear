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
  <title>Appointment Slip</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <?php 
      $usertest = $_SESSION["username"];
        // echo $usertest;
        // $query = mysql_query("select * from users where username ='$usertest'");
        // $row = mysql_fetch_array($query);
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






// $sql = "SELECT * FROM appointment_tbl WHERE appoint_id = {$_SESSION['myid']}";
      $sql="SELECT username, email, car_made, car_model,car_year, car_prob, prob_desc, appoint_date, appoint_time,appoin_created FROM users u INNER JOIN car_details c ON u.id = c.id INNER JOIN appointment_tbl a ON c.car_id = a.car_id WHERE a.appoint_id = {$_SESSION['myid']}";

$result = $con->query($sql);
if ($result !== false && $result->num_rows > 0){
  $row = $result->fetch_assoc();
  echo "<div class='ml-5 mt-5' style='padding-left: 100px; padding-top: 20px; padding-right: 300px'>
      <h1>Service Requested As</h1><br>
    <table class='table'>
      <tbody>
      <tr>
          <th>Appointment ID:</th>
          <td>".$_SESSION['myid']."</td>
        </tr>
        <tr>
          <th>Customer Name:</th>
          <td>".$row['username']."</td>
        </tr>
        <tr>
          <th>Customer Car:</th>
          <td>". $row['car_made']."&nbsp;". $row['car_model']."&nbsp;". $row['car_year']."</td>
        </tr>
        <tr>
          <th>Car Problem:</th>
          <td>".$row['car_prob']."</td>
        </tr> 
        <tr>
          <th>Car Problem Description:</th>
          <td>".$row['prob_desc']."</td>
        </tr>       
        <tr>
          <th>Email:</th>
          <td>".$row['email']."</td>
        </tr>
        <tr>
          <th>Appointment date:</th>
          <td>".$row['appoint_date']."</td>
        </tr>
        <tr>
          <th>Appointment Time:</th>
          <td>".$row['appoint_time']."</td>
        </tr>
        <tr>
          <th>Appointment created at:</th>
          <td>".$row['appoin_created']."</td>
        </tr>
        <tr>
          <th>Technician:</th>
          <td></td>
        </tr>
        <tr>
          <th>Accessment Manager Sign:</th>
          <td></td>
        </tr>
      </tbody>
    </table><br>
    <form class='d-print-non'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form>
  </div>";
}
  ?>
  
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