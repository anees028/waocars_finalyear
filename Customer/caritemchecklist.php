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
  <title>search car items checklist</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <div class="col-sm-6 mt-5  mx-3">
  <form action="" class="mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid">Enter Car ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger">Search</button>
  </form>
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


  if(isset($_REQUEST['checkid'])){
    $sql = "SELECT * FROM `car_itemschecklist` WHERE car_id = {$_REQUEST['checkid']}";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(($row['car_id']) == $_REQUEST['checkid']){ ?>
  <h3 class="text-center mt-5" style="margin-left: 300px">Assigned Work Details</h3>
  <table class="table table-bordered" style="margin-left: 175px">
    <tbody>
      <tr>
        <td>ID</td>
        <td>
          <?php if(isset($row['critm_id'])) {echo $row['critm_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>Car Items</td>
        <td>
          <?php if(isset($row['cr_allitms'])) {echo $row['cr_allitms']; } ?>
        </td>
      </tr>
      <tr>
        <td>Others</td>
        <td>
          <?php if(isset($row['cr_decor'])) {echo $row['cr_decor']; } ?>
        </td>
      </tr>
      <tr>
        <td>Created Datee</td>
        <td>
          <?php if(isset($row['datecreated'])) {echo $row['datecreated']; } ?>
        </td>
      </tr>
      
    </tbody>
  </table>
  <div class="text-center" style="margin-left: 325px; margin-bottom: 30px">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="caritemchecklist.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
  </div>
  <?php } else {
      echo "<script>alert('You don't have any checklist for this car)</script>";
      echo "<script> location.href='caritemchecklist.php'</script>";
 }
}

 ?>

</div>
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
    
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>