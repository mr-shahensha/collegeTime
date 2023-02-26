<?php 
include("connection.php");
    if(isset($_POST['submit'])){
        $crsnm=$_REQUEST['crsnm'];
        $f=0;
        $query1=mysqli_query($con,"  SELECT * FROM `course` ")or die(mysqli_error());
        while($result=mysqli_fetch_array($query1)){
            $f++;
        }
    $query=mysqli_query($con,"INSERT INTO `course` (`sid`, `courseid`, `coursename`) VALUES (NULL, 'crs$f', '$crsnm'); ");
    }
    ?>
<script>
    alert("succesfully inserted");
    document.location="course.php";

</script>