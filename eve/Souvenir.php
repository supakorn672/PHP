<?php
    require('dbconnect.php');
    require('header1.php');
    require('navbar.php');
    $sql = "SELECT * FROM souvenir ";
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
    <h2>Souvenir</h2>
    <hr width="100%" size="5" align="center" color="#d2d2d2" noshade>
      <table style="width:100%">
        <?php
         while ($row = $results->fetch_assoc()){
              ?>
              <tr>
              <th><img src="img/<?php echo $row['souvenir_image']?>" BORDER="2"	WIDTH="200" HEIGHT="200" ALIGN="top"	></th>
              <th style="width:1000px">souvenir name : <?php echo $row['souvenir_name']?>
              <br>price : <?php echo $row['souvenir_price'];
                              $_SESSION['souvenir_price'] = $row['souvenir_price'];
              ?>   THB
              <br>details : <?php echo $row['details']?>
              <br>event : <?php echo $row['event_id']?>
              <th><a href="receiptsouvenir.php?souvenir_id=<?php echo $row['souvenir_id']?>" class="btn btn-warning" style="width:100px;height: 200px;" role="button"><br><br><br><br>buy</a></th>
            </tr><br>
              <?php } ?>
              </table>
    </div>

<?php
// require('footer.php');
?>
</body>
</html>