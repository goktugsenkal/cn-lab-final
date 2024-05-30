<?php
include('connection.php');

$messageId = $_POST['messageId'];
$status = $_POST['action'];
$statusDesc = $_POST['statusDesc'];

    $status = mysqli_real_escape_string($con, $status);
    $statusDesc = mysqli_real_escape_string($con, $statusDesc);
    $messageId = mysqli_real_escape_string($con, $messageId);

    $sql = "UPDATE messages SET status = '$status', statusDesc = '$statusDesc' WHERE messageId = $messageId ";

    if (mysqli_query($con, $sql)) {
        echo "Your update has been successfully sent.";
        header("refresh:2;url=adminpage.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        header("refresh:5;url=adminpage.php");
    }

    mysqli_close($con);

?>
