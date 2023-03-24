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
  <title>Delete Appointment</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <div class="container">
  <div class="row">
    <div class="col-sm-4" >
      <?php
      $sql = "SELECT appointment_tbl.appoint_id, car_details.car_id, car_details.car_made, car_details.car_model, car_details.car_year, appointment_tbl.car_prob,appointment_tbl.prob_desc , appointment_tbl.appoint_date, appointment_tbl.appoint_time FROM appointment_tbl INNER JOIN car_details ON car_details.car_id=appointment_tbl.car_id ORDER BY appointment_tbl.appoint_id DESC";
      $query = $con->query($sql);
      if($query->num_rows > 0){
        while ($row = $query->fetch_assoc()) {
          ?>
          <div class="card border-primary mb-3" style="max-width: 20rem; height: 250px">
  <div class="card-header">Car Id: <?php echo $row['car_id'];?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['car_made'];?>&nbsp;<?php echo $row['car_model'];?>&nbsp;<?php echo $row['car_year'];?></h4>
    <p class="card-text"><!-- This is my <?php echo $row['car_made'];?>&nbsp;<?php echo $row['car_model'];?> car in <?php echo $row['car_color'];?> Color. I am here for online appointment purpose. --></p>
    <!-- <button type="button" class="btn btn-primary">Appointment</button> -->
    <form action="carassessment.php" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['car_id'];?>"><button type="submit" class="btn btn-warning" name="critms" value="Car items">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
</svg>
   </button>
</form>

<form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['car_id'];?>"><button type="submit" class="btn btn-danger" name="btndel"><i class="fa fa-trash"></i></button>
</form>

<form action="updatecar.php" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['car_id'];?>"><button type="submit" class="btn btn-primary" name="btnupdt" >
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
   </button>
</form>

<form action="carattachmentslist.php" method="POST" class="d-inline">
   <input type="hidden" name="carid" value="<?php echo $row['car_id'];?>"><button type="submit" class="btn btn-warning" name="cratlst" >
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
  <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"/>
</svg>
   </button>
</form>
    
  </div>
</div>
          <?php
        }
      }

       ?>
    </div>
    <div class="col-sm-8" style="background: blue">
      One of three columns
    </div>
    
  </div>
</div>
   
  
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>