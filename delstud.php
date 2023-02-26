<?php
include("back.php");
include("connection.php");
// $idd=$_SESSION['id'];
$sid=$_REQUEST['sid'];
$query=mysqli_query($con,"DELETE FROM student WHERE `sid` = '$sid'")or die(mysqli_error());
?>
<script>
    alert("sucessfully deleted ");
    document.location="stud.php";
</script>
