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
  <title>Add Car</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <form action="addcarform.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">        
    <h2>Add New Car Details</h2><br>
  <label>Car Made:</label>
  <input type="text" class="form-control" name="carmade1" placeholder="Toyota, Honda etc" onkeypress="validateString(event)" maxlength="10">
  <label>Car Model:</label>
  <input type="text" class="form-control" name="Carmodel" placeholder="Corolla, Civic etc" onkeypress="validateAdress(event)" maxlength="10">
  <label>Car Year:</label>
  <input type="text" class="form-control" name="caryear1" placeholder="2020, 2021" onkeypress="validateNumber(event)" maxlength="4">
  <label>Car color:</label>
  <input type="text" class="form-control" name="carcolor1" placeholder="white, Grey" onkeypress="validateString(event)" maxlength="10">
  <label>Car Registration:</label>
  <input type="text" class="form-control" name="carregis1" placeholder="Punjab, Sindh" onkeypress="validateString(event)" maxlength="10"><br>
  <!-- <label>Your City:</label>
  <input type="text" name="city1" placeholder="islamabad"><br><br>
  <label>Your Phone Number:</label>
  <input type="text" name="custphone1" placeholder="islamabad">
  <label>Date to Visit:</label>
  <input type="date" name="datetovisit" placeholder="30/12/2021"><br><br>
  <label>Time Slot:</label>
  <input type="text" name="timeslot" placeholder="12:00pm-2:00pm"><br> -->
    <!-- <input type="submit" name="btnsub" value="Insert" /> -->
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







  
  if(isset($_POST['btnsub'])) //isset alwasy return TRUE
    {
      if(($_REQUEST['carmade1'] =="") || ($_REQUEST['Carmodel'] == "") || ($_REQUEST['caryear1'] == "") || ($_REQUEST['carcolor1'] == "") || ($_REQUEST['carregis1'] == "") ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else{
              
        $car_ma = $_POST['carmade1'];
        $car_mo = $_POST['Carmodel'];
        $car_y = $_POST['caryear1'];
        $car_col = $_POST['carcolor1'];
        $car_regis = $_POST['carregis1'];
        

  
        $insert = "INSERT INTO car_details (car_made,car_model,car_year,car_color,car_registration,id) VALUES ('$car_ma','$car_mo','$car_y','$car_col','$car_regis','$id')";
  
        if(mysqli_query($con,$insert))
        {
          echo "<script>alert('New Car Added Successfully')</script>";
          echo "<script> location.href='mycars.php'</script>";
        }
        else
        {
          echo "<script>alert('Couldn't add new car)</script>";
        }
      }
  }
  ?>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnsub">Insert Car Record</button>
        </div>            
  </form>
  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
      <script>
  function validateNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateString(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateAdress(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z0-9, ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  

  
</script>
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>