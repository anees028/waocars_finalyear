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
  <title>car attachments list</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
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
 
  ?>


    <div class="container" style="margin-top: 40px">
  

<div class="row">
    <div class="col"><br><br>
      <h1>Car items</h1>
    </div>
  </div>
    
    <div class="row">
    <div class="col">
    <table class="table" style="margin-top: 50px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Car Item ID</th>
      <th scope="col">Car All Items</th>      
      <th scope="col">Others</th>
      <th scope="col">Date Created</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
    <?php
        
    $cid = $_REQUEST['carid'];
    // $select = "SELECT * FROM appointment_tbl WHERE id='$id'";
    $select = "SELECT * FROM `car_itemschecklist`WHERE car_id='$cid' ORDER BY critm_id DESC";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['critm_id']."</td>";
      echo "<td>". $row['cr_allitms']."</td>";
      echo "<td>". $row['cr_decor']."</td>";
      echo "<td>". $row['datecreated']."</td>";
      echo "<td>";
      
       echo "<form Action='' method='POST' class='d-inline'>";
       echo "<input type='hidden' name='crtmid' value=".$row['critm_id']."><button type='submit' class='btn btn-danger mr-3' name='btndel' value='Delete'><i class='fa fa-trash'></i></button>";
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
        $sql = "DELETE FROM car_itemschecklist WHERE critm_id ={$_REQUEST['crtmid']}";
        if($con->query($sql) == TRUE){
          echo "<script>alert('Record Deleted Successfully')</script>";
          echo "<script> location.href='mycars.php'</script>";
        }else{
          echo "<script>alert('Unable to Delete')</script>";
          echo "<script> location.href='mycars.php'</script>";
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