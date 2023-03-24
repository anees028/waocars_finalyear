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
  <title>Update Car</title>
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



     $ss = $_POST['id'];



     $select = "SELECT * FROM car_details WHERE car_id='$ss'";
        $result = mysqli_query($con,$select);
        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          while ($row = mysqli_fetch_array($result))
           {
            ?>

    <form action="" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">        
    <h2>Update Car Details</h2><br>    
    <label>Car ID:</label>
  <input type="text" class="form-control" name="carid" value="<?php echo $ss; ?>" readonly="">
  <label>Car Made:</label>
  <input type="text" class="form-control" name="carmade1" value="<?php echo $row['car_made'];?>" onkeypress="validateString(event)" maxlength="10">
  <label>Car Model:</label>
  <input type="text" class="form-control" name="Carmodel" value="<?php echo $row['car_model'];?>" onkeypress="alphanumeric(event)" maxlength="10">
  <label>Car Year:</label>
  <input type="text" class="form-control" name="caryear1" value="<?php echo $row['car_year'];?>" onkeypress="validateNumber(event)" maxlength="4">
  <label>Car color:</label>
  <input type="text" class="form-control" name="carcolor1" value="<?php echo $row['car_color'];?>" onkeypress="validateString(event)" maxlength="10">
  <label>Car Registration:</label>
  <input type="text" class="form-control" name="carregis1" value="<?php echo $row['car_registration'];?>" onkeypress="validateString(event)" maxlength="10"><br>
  <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btncrupdte">Update Car Record</button>
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


        if(isset($_POST['btncrupdte'])) //isset alwasy return TRUE
    {
        $car_id = $_POST['carid'];      
        $car_ma = $_POST['carmade1'];
        $car_mo = $_POST['Carmodel'];
        $car_y = $_POST['caryear1'];
        $car_col = $_POST['carcolor1'];
        $car_regis = $_POST['carregis1'];
        

  
        $insert = "UPDATE car_details SET car_made = '$car_ma', car_model = '$car_mo', car_year = '$car_y', car_color = '$car_col', car_registration = '$car_regis' WHERE car_id='$car_id'";
  
        if(mysqli_query($con,$insert))
        {
          echo "<script>alert('Car Update Successfully')</script>";
          echo "<script> location.href='mycars.php'</script>";
        }
        else
        {
          echo "<script>alert('could not update Car')</script>";
          echo "<script> location.href='updatecar.php'</script>";
        }
  }

        ?>
  
    

                
  
  
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
  function alphanumeric(evt) {
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