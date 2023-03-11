<?php
include("../logic/back.php");
include("../logic/connection.php");
// $idd=$_SESSION['id'];
$sid=$_REQUEST['sid'];
$query=mysqli_query($con,"DELETE FROM student WHERE `sid` = '$sid'")or die(mysqli_error());
$query1=mysqli_query($con,"DELETE FROM signup WHERE `id` = '$sid'")or die(mysqli_error());
// $query2=mysqli_query($con,"DELETE FROM student WHERE `stud_id` = '$sid'")or die(mysqli_error());

?>
<script>
    alert("sucessfully deleted ");
    document.location="../stud.php";
</script>
