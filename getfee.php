<?php 
 include("logic/connection.php");
 $degid=$_REQUEST['deg'];
$crsid=$_REQUEST['crs'];
$clg=$_REQUEST['clg'];
if($degid==0 && $crsid==0 && $clg==0){
?>
        <input readonly type="text" placeholder="0000.RS" id="fee" name="fee">

<?php
}else{
$query=mysqli_query($con,"SELECT * FROM `deg_crs_clg` where degid='$degid' and crsid='$crsid' and clgid='$clg'");
while($result=mysqli_fetch_assoc($query)){
    $fee=$result['fee'];
}
?>
<input readonly type="text" value="<?php echo $fee;?>.Rs" name="fee" id="fee">
<?php }?>