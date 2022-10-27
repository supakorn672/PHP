<?php
    require('session.php');
    require('dbconnect.php');
    // require('header.php');
    // require('navbar.php');
    $event_id=$_SESSION['event_id'];
    // $phone_number=$_SESSION['account']
    $sql1 = "SELECT * FROM events LEFT JOIN `account` ON `events`.`organizer_phone_number` = `account`.`phone_number` WHERE event_id=$event_id";
    $results = $conn->query($sql1);
    $row = $results->fetch_assoc()
    ?>
<!DOCTYPE html>
<style>
    h2{
    text-align: center;
    margin-left: 395px;
    width: 50%;
    color: black;
    font-size: 2vw;
    margin-bottom: 100px;
    border-radius: 3px;
    transition: 300ms;
    background: linear-gradient(to right, #e61b63, #9c1032);
    color: #fff;
}
a{
    font-family: 'Noto Sans', sans-serif;
    font-size: 1.2vw;
    color: #000;
    text-align: center; 
}
b{
    font-family: 'Noto Sans', sans-serif;
    font-size: 1.2vw;
    color: #000;
    text-align: center; 
    margin-left: 400px;
}
</style>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="event-souvenir.css"> -->
    <title>Souvenir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>

    <h2 style="position: relative; top:10px;">QR Virtual run Event</h2>
    <h><img src="img/QR.png" BORDER="2"	WIDTH="200" HEIGHT="200" ALIGN="top" style="position: relative; top:10px; left: 670px;  border-radius: 3px;"></h>
    <?php
    
              ?>
 
              <div class="container"><br>
                    <b>Event ID : <?php echo $row['event_id'];?></b><br>
                    <b>Event name :<?php echo $row['event_name']?></b><br>
                    <b>Firstname :<?php echo $row['fname']?></b><br>
                    <b>Lastname :<?php echo $row['lname']?></b><br>
                    <b>Price :<?php echo $row['price']?></b>
        <div class="row mt-5">
            <div class="col-12">
                <form action="qrupload.php" method="POST" enctype="multipart/form-data">
                <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <!-- <input type="hidden" name="event_id" class="form-control streched-link" value="<?php echo $event_id ?>"disabled required>
                        <input type="hidden" name="event_name" class="form-control streched-link" value="<?php echo $event_name ?>"disabled required>
                        <input type="hidden" name="fname" class="form-control streched-link" value="<?php echo $fname ?>"disabled required>
                        <input type="hidden" name="price" class="form-control streched-link" value="<?php echo $price ?>"disabled required> -->
                        <!-- <input type="hidden" name="event_id" class="form-control streched-link" accept="image/gif, image/jpeg, image/png"> -->
                    </div>
                    <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><c>Note:</c> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                    </div>
                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-danger mb-3">
                        <a href= "showevent.php" class="btn btn-sm btn-default mb-3">back</a>
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
    </div>
</body>
</html>