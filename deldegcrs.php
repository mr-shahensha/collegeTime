<?php 
 include("logic/connection.php");
 $sid=$_REQUEST['sid'];
$query=mysqli_query($con,"delete from deg_crs where sid='$sid'")or die(mysqli_error());
?>
<script>
    alert("deleted succesfulyy");
    document.location="degcourse.php";
</script>