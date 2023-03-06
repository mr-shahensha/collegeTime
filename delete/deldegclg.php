<?php 
 include("../logic/connection.php");
 $sid=$_REQUEST['sid'];
$query=mysqli_query($con,"delete from `deg_crs_clg` where sid='$sid'")or die(mysqli_error());
?>
<script>
    alert("succesfully deleted ");
    document.location='../degclg.php';
</script>