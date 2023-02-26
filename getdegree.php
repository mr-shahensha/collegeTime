<?php 
include("connection.php");
$clgid=$_REQUEST['a'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

<select name="deg" id="degvali"onchange="fun2(this.value,'<?php echo $clgid;?>')">
    <option value="">select degree</option>
    <?php 
     $query=mysqli_query($con,"SELECT Distinct degid  FROM `deg_crs_clg` where clgid='$clgid'");
 while($result=mysqli_fetch_assoc($query)){
    $degid=$result['degid'];
    ?>
    <option value="<?php echo $degid; ?>">
    <?php
     $query2=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$degid'");
     while($result2=mysqli_fetch_assoc($query2)){
        $degnm=$result2['degreename'];
    
    echo $degnm;
     }?></option>
    <?php
 }
    ?>
    </select>

    
</body>
</html>