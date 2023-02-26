<?php
include("connection.php");
include("back.php");
$stat=$_REQUEST['stat'];
$stud=$_REQUEST['stud'];
$sid=$_REQUEST['sid'];
date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y h:i:s a', time());
$query4=mysqli_query($con,"SELECT * FROM `request` where stud_id='$stud' and sid='$sid'");
while($result=mysqli_fetch_assoc($query4)){
    $newname=$result['name'];
    $newnumber=$result['number'];
    $newdob=$result['dateofbirth'];
}
if($stat==2){
    $query2=mysqli_query($con,"update student set name='$newname' ,number='$newnumber',dateofbirth='$newdob' where myid='$stud'");
    $query1=mysqli_query($con,"update request set statusdate='$datetime'where stud_id='$stud' and sid='$sid'");

echo "<p style='color:green;'>accepted</p>";
}else{
    $query3=mysqli_query($con,"update request set statusdate='$datetime'where stud_id='$stud' and sid='$sid'");
    echo "<p style='color:red;'>rejected</p>";
}
$query=mysqli_query($con,"UPDATE `request` SET `status` = '$stat' WHERE `request`.`stud_id` = '$stud'and sid='$sid' ");
?>