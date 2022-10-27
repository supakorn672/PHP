<?php
    require('dbconnect.php');
    require('session.php');
    require('header1.php');
    require('navbar.php');
    if (!isset($_SESSION['account'])){
        $_SESSION['error'] = 'You must log in first!';
        header('location: login-register.php');
    }
    $event_id=$_GET['event_id'];
    $sql = "SELECT * FROM events LEFT JOIN `account` ON `events`.`organizer_phone_number` = `account`.`phone_number` WHERE event_id=$event_id";
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
</head>
<body>
    <h2>Receipt</h2>
    <table>
    <thead class="thead-dark">
  <?php
              ?>
              <table class="table">
                  <thead class="thead-dark">
                  <th><img src="img/<?php echo $row['event_image']?>" BORDER="2"	WIDTH="250" HEIGHT="200" ALIGN="top" style="position: relative; top:0px; left: 440px;"></th>
                    <tr>
                    <th scope="col" style="width:100px">Event name :</th>
                    <td><?php echo $row['event_name']?></td>
                    <th style="width:500px"><b>Date : </b><?php echo date('Y-m-d h:m:s'); ?></th>
                    </tr>
                    <tr>
                    <th scope="col">Firstname :</th>
                    <td><?php echo $row['fname']?></td>
                    <th>Price : <?php echo $row['price'];
                                    $_SESSION['price'] = $row['price'];?></th>
                    </tr>
                    <tr>
                    <th scope="col">Lastname :</th>
                    <td><?php echo $row['lname']?></td>
                    <th>Event ID : <?php echo $row['event_id'];
                                        $_SESSION['event_id'] = $row['event_id'];
                    ?></th>
                    </tr>
                    <tr>
                    <th scope="col">email :</th>
                    <td><?php echo $row['email']?></td>
                    </tr>
                    <tr>
                    <th scope="col">phonenumber :</th>
                    <td><?php echo $row['phone_number']?></td>
                    </tr>
                    <!-- <td><a href="qr.php?event_id=<?php echo $row['event_id']?>" class="btn btn-success" style="position: relative; top:0px; left: 950px; width:180px;height: 35px;" role="button">Payment</a></td> -->
              </tr> 
              </table>
              <form action="qr.php" method="GET" enctype="multipart/form-data">
              <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <input type="hidden" name="event_id" class="form-control streched-link" value="<?php echo $event_id ?>"disabled required>
                        <input type="hidden" name="event_name" class="form-control streched-link" value="<?php echo $event_name ?>"disabled required>
                        <input type="hidden" name="fname" class="form-control streched-link" value="<?php echo $fname ?>"disabled required>
                        <input type="hidden" name="price" class="form-control streched-link" value="<?php echo $price ?>"disabled required>
                    </div>
                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-danger mb-3">
                        <a href= "showevent.php" class="btn btn-sm btn-default mb-3">back</a>
                    </div>
              
      
</body>
</html>