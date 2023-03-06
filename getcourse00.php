<?php
include("logic/back.php");
include("logic/connection.php");
$degid=$_REQUEST['deg'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    
<select name="crs" id="crsvali" onchange="return hidewarn2(this.value)">
            <option value="">select course</option>
            <?php 
   $query=mysqli_query($con,"SELECT * FROM `deg_crs`  where degid='$degid'");
   while($result=mysqli_fetch_assoc($query)){
       $crsid=$result['crsid'];

    ?>
    <option value="<?php echo $crsid; ?>"><?php 
       $query2=mysqli_query($con,"SELECT * FROM `course`  where courseid='$crsid'");
       while($result2=mysqli_fetch_assoc($query2)){
           $crsnm=$result2['coursename'];

       }
    
    echo $crsnm;?></option>
    <?php
 }
    ?>
        
    </select>
</body>
</html>
