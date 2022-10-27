<?php 

require('session.php');
include_once 'dbconnect.php';

// File upload path
$targetDir = "img/";

if (isset($_POST['submit'])) {
    if (!empty($_FILES["file"]["name"])) {
        
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $event_id = $_SESSION['event_id'];
        // unset($_SESSION['event_id']);
        $sql = "SELECT COUNT(`event_payment_list`.`event_payment_list_id`)
        FROM `event_payment_list`
        WHERE `event_payment_list`.`event_payment_list_id`=$event_id";
        $event_price = $_SESSION['price'];
        unset($_SESSION['price']);
        $phone_number = $_SESSION['account'];
        $pay_time_event = date('Y-m-d : h:m:s');
        $event_payment_status = true;
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $conn->query("INSERT INTO event_payment_list(event_payment_status, event_price, event_id, phone_number, pay_time_event, pay_slip_image) 
                VALUES ('$event_payment_status','$event_price','$event_id','$phone_number','$pay_time_event','$fileName')");
                $update="UPDATE events SET number_of_participants = '$sql' WHERE events.event_id = $event_id";
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: showevent.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: showevent.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: showevent.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: showevent.php");
        }
    } else {
        $_SESSION['statusMsg'] = "No souvenir.";
        header("location: showevent.php");
    }
}

?>