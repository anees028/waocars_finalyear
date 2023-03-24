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
  <title>Take Appointment</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

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

  if(isset($_REQUEST['btnsub'])){
    if(($_REQUEST['carprob'] =="") || ($_REQUEST['probdesc'] == "") || ($_REQUEST['appointdate'] == "") || ($_REQUEST['appointtime'] == "") ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else {

        $cr_prob = $_POST['carprob'];
       $prob_desc = $_POST['probdesc'];
       $appnt_date = $_POST['appointdate'];
       $appnt_time = $_POST['appointtime'];
       $slctcar = $_POST['selcar'];
       $create_datetime = date("Y-m-d H:i:s");


  
       $insert = "INSERT INTO appointment_tbl (car_prob,prob_desc,appoint_date,appoint_time,id,car_id,appoin_created) VALUES ('$cr_prob','$prob_desc','$appnt_date','$appnt_time','$id','$slctcar','$create_datetime')";
  
       // if(mysqli_query($db,$insert))      //you can also use this instead of below 
       if($con->query($insert) == TRUE)        
       {
        $genid = mysqli_insert_id($con);
         echo "<script>alert('Appointment is Requested Successfully')</script>";
         $_SESSION['myid'] = $genid;
         echo "<script> location.href='submitrequestsuccess.php'</script>";
       }
       else
       {
         echo "<script>alert('Appointment couldn't requested')</script>";
       }

    }
  }
  
  
  ?>

 <form action="takeappointment.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">
  <div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Important Note!</h4>
  <p class="mb-0">User must complete their profile first otherwise the appointment will b lost or will not accepted <a href="updateprofile.php" class="alert-link">Complete your Profile</a>.</p>
</div>
    
    <h2>Appointment Form</h2><br>
    <label>Select car for Appointment</label>
    <select name="selcar" class="form-control">
      <option>----Please select car------</option>
      <?php  
      $sel = "SELECT * FROM car_details WHERE id='$id'";
      $result = mysqli_query($con,$sel);
      while($rows = mysqli_fetch_array($result))
      {
       echo "<option value= ".$rows[0].">".$rows[1]."&nbsp;".$rows[2]."</option>";
      }
      ?>
    </select>
  <label>Car Problem</label>
  <!-- <input type="text" class="form-control" name="carprob" placeholder="Oil Leakage"> -->
  <select class="form-control" name="carprob">
    <option value="Denter">Denter</option>
    <option value="Painter">Painter</option>
    <option value="Electrical">Electrical</option>
    <option value="Mechanical">Mechanical</option>
  </select>
  <label>Problem Description</label>
  <input type="text" class="form-control" name="probdesc" id="probdesc" placeholder="i.e Oil Change & tuning" onkeypress="isInputCharacter(event)"><br><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Appointment Date</label>
        <input type="date" class="form-control" name="appointdate">
   </div>
   <div class="form-group col-md-6">
        <label>Appointment Time</label>
        <input type="time" class="form-control" name="appointtime">
   </div>
</div>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnsub">Cofirm Appointment</button>
        </div>
        <?php if(isset($msg)){echo $msg;} ?>
  </form>






  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script>
    function isInputCharacter(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z ]/.test(ch))) {
      evt.preventDefault();
    }
  }
  </script>
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>