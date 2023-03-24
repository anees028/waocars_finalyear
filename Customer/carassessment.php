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
  <title>Checklist items</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>
    <div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
      <div class="col-md-8">
    <div class="card md-5">
    <div class="card-header">
    <div class="card-body">
    <form action="" method="POST">
      <h1>Car Items Check List</h1>      
      <input type="hidden" name="car_id" value=" <?php echo $_POST['id']; ?>" >
      <div class="form-group">
        <input type="Checkbox" name="items[]" value="Tyre changing tools">   Tyre changing tools<br>
        <input type="Checkbox" name="items[]" value="Spare Tyre">   Spare Tyre<br>
        <input type="Checkbox" name="items[]" value="Styring lock">   styring lock<br>
        <input type="Checkbox" name="items[]" value="Window Blinds">   window blinds<br>
        <input type="Checkbox" name="items[]" value="Floor Mates">   Floor Mates<br>
        <input type="Checkbox" name="items[]" value="Wheel Cups">   Wheel cups<br>
        <input type="Checkbox" name="items[]" value="Sound System">   Sound System<br>
        <input type="Checkbox" name="items[]" value="Security System">   Security System<br>
        <input type="Checkbox" name="items[]" value="Android/Multimedia pannel">   Android/Multimedia pannel<br>
        <input type="Checkbox" name="items[]" value="Seat Covers">   seat covers<br>
        <input type="Checkbox" name="items[]" value="Stayring Covers">   stayring covers<br> 
        <input type="Checkbox" name="items[]" value="Mobile Charger">   mobile charger<br>
        <input type="Checkbox" name="items[]" value="Car Freshner">   Car Freshner<br>
        <input type="Checkbox" name="items[]" value="Aux Cable">   aux cable<br>        
        <input type="Checkbox" name="items[]" value="Seat Belts">   Seat Belts<br>        
        <input type="Checkbox" name="items[]" value="First Aid Box">   First Aid Box<br>
        <input type="Checkbox" name="items[]" value="Breaks/Head lights">   Head/Break lights<br><br>
        
        <label>Other items</label>
        <input type="text" class="form-control" name="crdec"><br>
        <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="insrtitms" id="insrtitms">Insert Items</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
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
      

        if(isset($_POST['insrtitms'])){
          $check = implode(',', $_POST['items']);
          $cardecor= $_REQUEST['crdec'];
          $ccid= $_REQUEST['car_id'];
          $create_datetime = date("Y-m-d H:i:s");
          
          $qry = $con->query("INSERT INTO `car_itemschecklist`(`cr_allitms`, `cr_decor`, `car_id`, `datecreated`) VALUES('$check','$cardecor','$ccid','$create_datetime')");
          if ($qry>0) {
            echo "<script> alert('Car Item's saved Successfully');</script>";
            echo "<script> location.href='mycars.php'</script>";
          }
          else{
             echo "<script> alert('couldn't save car item's');</script>";
             echo "<script> location.href='carassessment.php'</script>";
          }
        }
 ?>

    
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>