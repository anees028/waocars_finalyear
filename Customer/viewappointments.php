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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>View Appointments</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>
    <div class="container" style="margin-top: 40px">
  

<div class="row">
    <div class="col"><br><br>
      <h1>Car Appointments</h1>
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
      <th scope="col">Problem Description</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
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

    
    // $select = "SELECT * FROM appointment_tbl WHERE id='$id'";
    $select = "SELECT appointment_tbl.appoint_id, car_details.car_id, car_details.car_made, car_details.car_model, car_details.car_year, appointment_tbl.car_prob,appointment_tbl.prob_desc , appointment_tbl.appoint_date, appointment_tbl.appoint_time FROM appointment_tbl INNER JOIN car_details ON car_details.car_id=appointment_tbl.car_id WHERE appointment_tbl.id = '$id' ORDER BY appointment_tbl.appoint_id DESC";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['appoint_id']."</td>";
      echo "<td>". $row['car_made']."&nbsp;". $row['car_model']."&nbsp;". $row['car_year']."</td>";
      echo "<td>". $row['car_prob']."</td>";
      echo "<td>". $row['prob_desc']."</td>";
      echo "<td>". $row['appoint_date']."</td>";
      echo "<td>". $row['appoint_time']."</td>";
      echo "<td>";
      echo "<form Action='updateappointment.php' method='POST' class='d-inline'>";
       echo "<input type='hidden' name='id' value=".$row['appoint_id']."><button type='submit' class='btn btn-info mr-3' name='edit' value='Edit'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
</svg></button>";
       echo "</form>";
       echo "<form Action='' method='POST' class='d-inline'>";
       echo "<input type='hidden' name='id' value=".$row['appoint_id']."><button type='submit' class='btn btn-danger mr-3' name='btndel' value='Delete'><i class='fa fa-trash'></i></button>";
       echo "</form>";
       echo "</td>";
       echo "</tr>";
    }
    
    ?>
  
  </table>
</div>
</div>

</div>
<?php
       if(isset($_REQUEST['btndel'])){
        $sql = "DELETE FROM appointment_tbl WHERE appoint_id = {$_REQUEST['id']}";
        if($con->query($sql) == TRUE){
          echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }else{
          echo 'Unable to Delete';
        }
       }
       mysqli_close($con);
  ?>
  
   
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>