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
        $souvenir_payment_status = true;
        $phone_number = $_SESSION['account'];
        $pay_time_souvenir = date('Y-m-d : h:m:s');
        $souvenir_price = $_SESSION['souvenir_price'];
        $event_payment_list_id = $_SESSION['event_id'];
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $conn->query("INSERT INTO souvenir_payment_list(souvenir_payment_status,souvenir_price,phone_number,event_payment_list_id,pay_time_souvenir,pay_slip_image) 
                VALUES ('$souvenir_payment_status','$souvenir_price','$phone_number','$event_payment_list_id','$pay_time_souvenir','$fileName')");
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: Souvenir.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: Souvenir.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: Souvenir.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: Souvenir.php");
        }
    } else {
        $_SESSION['statusMsg'] = "No souvenir.";
        header("location: Souvenir.php");
    }
}

?>