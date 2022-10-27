<?php
    require('dbconnect.php');
    require('header1.php');
    require('navbar.php');
    $sql = "SELECT * FROM events ";
    $results = $conn->query($sql);
    
    ?>
<html>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #fff;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #fff;
}
</style>
    <head>
</head>
    <body>
    <h2>Event</h2>
    <hr width="100%" size="5" align="center" color="#d2d2d2" noshade>
      <table style="width:100%">
        <?php
         while($row = $results->fetch_assoc()){
              ?>
              <tr>
                <th><img src="img/<?php echo $row['event_image']?>" BORDER="2"	WIDTH="200" HEIGHT="150" ALIGN="top"	></th>
                <th style="width:1000px"> Eventname : <?php echo $row['event_name']?>
                <br>location : <?php echo $row['location']?>
                <br>objective : <?php echo $row['objective']?>
                <br>distance : <?php echo $row['distance']?>   Km.  
                <br>number of participants : <?php echo $row['number_of_participants']?>   Person
                <br>limitnumber : <?php echo $row['limit_number']?>   Person
                <br>price : <?php echo $row['price']?>   THB
                <br>organizer phonenumber : <?php echo $row['organizer_phone_number']?>
                <th><a href="receipt.php?event_id=<?php echo $row['event_id']?>" class="btn btn-warning" style="width:100px;height: 200px;" role="button"><br><br><br><br>เข้าร่วม</a></th>
              </tr><br>
              
              <?php
            } 
            ?>
              </table>


<?php
// require('footer.php');
?>
</body>
</html>