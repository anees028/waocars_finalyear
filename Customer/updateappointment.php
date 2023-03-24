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
  <title>Update Appointment</title>
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


        if (isset($_REQUEST['edit'])) {
            

        $select = "SELECT appoint_id, car_made, car_model, car_year, car_prob, prob_desc, appoint_id,appoint_date, appoint_time from appointment_tbl a INNER JOIN car_details c ON a.car_id = c.car_id WHERE a.appoint_id={$_REQUEST['id']}";
        $result = mysqli_query($con,$select);

        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          while ($row = mysqli_fetch_array($result))
           {
            ?>

    

     <form action="" method="POST" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">
          
    <h2>Appointment Form</h2><br>
    <label for="apointid">Appointment ID</label>
  <input type="text" class="form-control" name="apointid" id="apointid" value="<?php echo $row['appoint_id'];?>" readonly>
    <label for="phoneno">Select car for Appointment</label>
    <input type="text" class="form-control" name="selcar" id="selcar" value="<?php echo $row['car_made'];echo str_repeat('&nbsp;', 1);echo $row['car_model'];echo str_repeat('&nbsp;', 1);echo $row['car_year'];?>" readonly>
    
  <label for="carprob">Car Problem</label>  
  <select class="form-control" name="carprob">
    <option ><?php echo $row['car_prob'];?></option>
    <option value="Denter">Denter</option>
    <option value="Painter">Painter</option>
    <option value="Electrical">Electrical</option>
    <option value="Mechanical">Mechanical</option>
  </select>
  <label for="probdesc">Problem Description</label>
  <input type="text" class="form-control" name="probdesc" value="<?php echo $row['prob_desc'];?>" onkeypress="validateString(event)"><br><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="appointdate">Appointment Date</label>
        <input type="date" class="form-control" name="appointdate" value="<?php echo $row['appoint_date'];?>">
   </div>
   <div class="form-group col-md-6">
        <label for="appointtime">Appointment Time</label>
        <input type="time" class="form-control" name="appointtime" value="<?php echo $row['appoint_time'];?>">
   </div>
</div>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnupdte">Update Appointment</button>
        </div>
        
  </form>

  <?php
            

            # code...
          }
        }
        else
        {
          echo "No Result Found";

        }

         }

      if (isset($_REQUEST['btnupdte'])) {
          if (($_REQUEST['carprob'] == "") || ($_REQUEST['probdesc'] == "") || ($_REQUEST['appointdate'] == "") || ($_REQUEST['appointtime'] == "")) {            
            echo "<script>alert('All Field are Required ')</script>";
          }
          else{
            $apntid = $_REQUEST['apointid'];
            $crprp = $_REQUEST['carprob'];
            $prbdsc = $_REQUEST['probdesc'];
            $apntdte = $_REQUEST['appointdate'];
            $apnttme = $_REQUEST['appointtime'];
            
            $sql = "UPDATE appointment_tbl SET car_prob = '$crprp', prob_desc = '$prbdsc', appoint_date = '$apntdte', appoint_time = '$apnttme' WHERE appoint_id='$apntid'";
            if(mysqli_query($con,$sql))
        {
          echo "<script>alert('Appointment Update Successfully')</script>";
          echo "<script> location.href='viewappointments.php'</script>";
        }
        else
        {
          echo "<script>alert('could not update Appointment')</script>";
        }
          }
          # code...
        }

        ?>

        


    
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