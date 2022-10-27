<?php
    require('dbconnect.php');
    require('header1.php');
    require('navbar.php');
    require('session.php');
    if (!isset($_SESSION['account'])){
        $_SESSION['error'] = 'You must log in first!';
        header('location: login-register.php');
    }
    $souvenir_id=$_GET['souvenir_id'];
    $sql = "SELECT * FROM `souvenir` 
        LEFT JOIN `events` ON `souvenir`.`event_id` = `events`.`event_id` 
        LEFT JOIN `account` ON `events`.`organizer_phone_number` = `account`.`phone_number` WHERE souvenir_id=$souvenir_id";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc()

    ?>
<html>
<style>
h2{
    text-align: center;
}
h1{
  
}
</style>
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Receipt</h2>
    <table>
    <thead class="thead-dark">
  <?php
              ?>
              
    <table>
    <thead class="thead-dark">
  <?php
              ?>
              <table class="table">
                  <thead class="thead-dark">
                  <th><img src="img/<?php echo $row['souvenir_image']?>" BORDER="2"	WIDTH="250" HEIGHT="200" ALIGN="top" style="position: relative; top:0px; left: 440px;"></th>
                    <tr>
                    <th style="width:100px">souvenir name :</th>
                    <td><?php echo $row['souvenir_name']?></td>
                    <th style="width:500px"><b>Date : </b><?php echo date('Y-m-d h:m:s'); ?></th>
                    </tr>
                    <tr>
                    <th >email :</th>
                    <td><?php echo $row['email']?></td>
                    <th>Price : <?php echo $row['souvenir_price'];
                                    $_SESSION['souvenir_price'] = $row['souvenir_price'];?></th>
                    </tr>
                    <tr>
                    <th >phonenumber :</th>
                    <td><?php echo $row['phone_number']?></td>
                    <th>Event ID : <?php echo $row['event_id'];
                                        $_SESSION['event_id'] = $row['event_id'];

                    ?></th>
                    </tr>
                    <tr>
                    <th>souvenir id : <?php echo $row['souvenir_id'];
                                            $_SESSION['souvenir_id'] = $row['souvenir_id'];
                    ?></th>
                    </tr>
              </tr> 
              </table>
              <h><img src="img/QR.png" BORDER="2"	WIDTH="160" HEIGHT="150" ALIGN="top" style="position: relative; top:-40px; left: 470px;  border-radius: 3px;"></h>
              <form action="upload.php" method="POST" enctype="multipart/form-data">
              <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <input type="hidden" name="event_id" class="form-control streched-link" value="<?php echo $row['event_id'] ?>"disabled required>
                        <input type="hidden" name="souvenir_price" class="form-control streched-link" value="<?php echo $row['souvenir_price'] ?>"disabled required>
                        <input type="hidden" name="phone_number" class="form-control streched-link" value="<?php echo $row['phone_number'] ?>"disabled required>
                        
                    </div>
                    <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><c>Note:</c> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                    </div>
                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-danger mb-3">
                        <a href= "Souvenir.php" class="btn btn-sm btn-default mb-3">back</a>
                    </div>
                    </form>
                        </div>
                    </div>
                    <div class="row">
                        <?php  if (!empty($_SESSION['statusMsg'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php 
                                    echo $_SESSION['statusMsg']; 
                                    unset($_SESSION['statusMsg']);
                                ?>
                            </div>
                        <?php } ?>
                    </div>
              
      
</body>
</html>