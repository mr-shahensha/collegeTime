<?php 
 include("logic/connection.php");
 $sid=$_REQUEST['sid'];
$query=mysqli_query($con,"delete from college where sid='$sid'")or die(mysqli_error());
?>
<script>
    alert("successfully deleted ");
    document.location="college.php";
</script>