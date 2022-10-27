<?php
require('session.php');
require('dbconnect.php');
$event_id=$_SESSION['event_id']
$love = "SELECT `event_payment_list`.`event_payment_list_id`
FROM `event_payment_list`
WHERE `event_payment_list`.`event_payment_list_id`='$event_id'";

$results = mysqli_query($conn,$love);
$num = mysqli_num_rows($results);
echo $num;
?>