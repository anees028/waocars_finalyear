<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row" style="height:8px;">
        <div class="col-sm-4">
          <h2 style="font-family: Monospace;" class="text-success h2"><center>Teams</center></h2>
        </div>
        <div class="col-sm-8">
          <h2 style="font-family: Monospace;" class="text-success h2">
        <center>Team Details</center>
      </h1>
        </div>
      </div>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Teams</li>
        <li class="active">Team List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-4">
          <div class="box">
            <div class="box-body">             
                <?php
                $sql = "select * from position";
                $run = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($run)) {
                  $sql2 = "SELECT * FROM `employees` WHERE `position_id`='$row[id]'";
                  $run2 = $conn->query($sql2);
                  if ($run2) {
                    $total2 = 0;
                    ?>                    
                      <div class="row">
                        <div class="col-md-12">
                          <?php
                            while ($row2 = mysqli_fetch_assoc($run2)) {
                              $total2++;
                            }
                          ?>

                          <div class="small-box bg-green"> 
                            <div class="inner">
                              <h1><?php echo $total2; ?></h1>
                              <p><?php echo $row['description']; ?></p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-stalker"></i>                        
                            </div>
                            <a href="team.php?id=<?php echo $row['id']; ?>" class="small-box-footer" id="x" width="100%" data-id="<?php echo $row['id']; ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>                     
                      </div>                  
                    <?php                  
                  }
                }
                ?>
            </div>
          </div>
        </div>
        <div class="col-xs-8">
          <div class="box">
            <div class="box-body">
              <!-- table content -->
              <table id="example1" class="table table-striped table-success bg-success">
                <thead>
                  <tr class="bg-dark">
                    <!--<th scope="col">#</th>-->
                    <th scope="col">Employee #</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                  </tr>
                </thead>
                <tbody id="employees">
                    <?php
                    include('includes/conn.php');
                      if (isset($_GET['id'])) {
                      $p_id = $_GET['id'];
                      $sql = "SELECT * FROM `employees` WHERE `position_id`='$p_id'";
                      $run = $conn->query($sql);
                      while($row = mysqli_fetch_assoc($run))
                      {
                        ?>
                        <tr>
                          <!--<td><?php echo $row['id']; ?></td>-->
                          <td><?php echo $row['employee_id']; ?></td>
                          <td><?php echo $row['firstname']; ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                        </tr>
                        <?php
                      }
                      }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/team_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>

$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.small-box-footer .delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  
  $.ajax({
    type: 'POST',
    url: 'team_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      // $('.teamId').val(response.teamId);
      // $('.teamName').html(response.teamName);
      // $('.teamShop').html(response.teamShop);
      // $('#employee_name').html(response.firstname+' '+response.lastname);
      // $('#edit_firstname').val(response.firstname);
      // $('#edit_lastname').val(response.lastname);
      // $('#edit_address').val(response.address);
      // $('#datepicker_edit').val(response.birthdate);
      // $('#edit_contact').val(response.contact_info);
      // $('#gender_val').val(response.gender).html(response.gender);
      // $('#position_val').val(response.position_id).html(response.description);
      // $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
