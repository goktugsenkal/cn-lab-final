<?php
session_start();

include("connection.php");

$ex = mysqli_real_escape_string($con, $_POST['ex']);
$why = mysqli_real_escape_string($con, $_POST['why']);
$new = mysqli_real_escape_string($con, $_POST['new']);
$type = mysqli_real_escape_string($con, $_POST['type']);
$userId = $_SESSION['user_id'];

$query = "SELECT name FROM students WHERE id = $userId";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$senderName = mysqli_real_escape_string($con, $row['name']);

$content = "<br>Dersin kodu: " . $ex . "<br>Bırakılma nedeni: " . $why . "<br>Alınması istenen ders: " . $new;

$sqlquery = "INSERT INTO messages (senderId, senderName, type, content) VALUES ('$userId', '$senderName', '$type', '$content')";

if ($con->query($sqlquery) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("Message succesfully sent!")';
    echo '</script>';
    header("refresh:0;url=userpage.php");
} else {
    echo "Error: " . $sqlquery . "<br>" . $con->error;
    header("refresh:5;url=userpage.php");
}
?>