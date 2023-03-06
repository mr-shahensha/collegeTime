<?php 
 include("../logic/connection.php");
 $sid=$_REQUEST['sid'];
$query=mysqli_query($con,"delete from course where sid='$sid'")or die(mysqli_error());
?>
<script>
    alert("sucessfully deleted ");
    document.location="../course.php";
</script>