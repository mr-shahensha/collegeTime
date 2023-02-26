<?php
include("back.php");
include("connection.php");
$degid=$_REQUEST['deg'];
$clgid=$_REQUEST['clg'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    
<select name="crs" id="crsvali" onchange="fun3(this.value,'<?php echo $clgid;?>','<?php echo $degid;?>')">
            <option value="">select course</option>
            <?php 
   $query=mysqli_query($con,"SELECT * FROM `deg_crs_clg`  where degid='$degid' and clgid='$clgid'");
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
