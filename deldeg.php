<?php 
include("connection.php");
$sid=$_REQUEST['sid'];
$query=mysqli_query($con,"delete from degree where sid='$sid'")or die(mysqli_error());
?>
<script>
    alert("succesfully deleted");
    document.location="degree.php";
</script>