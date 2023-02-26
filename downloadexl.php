<?php 
include("connection.php");
$degid=$_REQUEST['deg'];
$clgid=$_REQUEST['clg'];
$crsid=$_REQUEST['crs'];

if($clgid=='')
{
    $q1='';
}else{
    $q1=" and college='$clgid'";
}
if($degid=='')
{
    $q2='';
}else{
    $q2=" and degree='$degid'";
}
if($crsid=='')
{
    $q3='';
}else{
    $q3=" and course='$crsid'";
}
// if($degid==0 && $clgid==0 && $crsid ==0){
//     $query=mysqli_query($con,"SELECT * FROM `student`"); 
// }else if($degid==0 && $clgid!=0 && $crsid ==0){
//     $query=mysqli_query($con,"SELECT * FROM `student` where college='$clgid' "); 
// }else if($degid!=0 && $clgid!=0 && $crsid ==0){
//     $query=mysqli_query($con,"SELECT * FROM `student` where college='$clgid' and degree='$degid' "); 
// }else if($clgid!=0 && $degid!=0 && $crsid !=0){
//     $query=mysqli_query($con,"SELECT * FROM `student` where college='$clgid' and degree='$degid' and course='$crsid'"); 
// }
// echo $q4="SELECT * FROM `student` where sid>0".$q1.$q2.$q3;
$query=mysqli_query($con,"SELECT * FROM `student` where sid>0".$q1.$q2.$q3);

date_default_timezone_set('Asia/Kolkata');
$dt = date('d/m/Y h:i:s a', time());
$file="Student Details(As On".$dt.").xls";//.doc
header("Content-type: application/vnd.ms-word"); //ms-word
header("Content-Disposition: attachment; filename=$file");
?>
<table border="1">
        <tr>
            <td><b>sid</b></td>
            <td><b>name</b></td>
            <td><b>number</b></td>
            <td><b>degree</b></td>
            <td><b>course</b></td>
            <td><b>college</b></td>
        </tr>
        <tr>
            <?php 
          
          $total=mysqli_num_rows($query);
            if($total!=0){
                $f=0;
                while($result=mysqli_fetch_assoc($query)){
                    $deg=$result['degree'];
                    $name=$result['name'];
                    $number=$result['number'];
                    $crs=$result['course'];
                    $clg=$result['college'];

                    $f++;
                
            ?>
            <tr>
<td><?php echo $f;?></td>
<td><?php echo $name;?></td>
<td><?php echo $number;?></td>
<td><?php
$query2=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$deg'");
while($result2=mysqli_fetch_assoc($query2)){
   $degnm=$result2['degreename'];
}
echo $degnm; ?></td>
<td><?php  $query3=mysqli_query($con,"SELECT * FROM `course` where courseid='$crs'");
            while($result3=mysqli_fetch_assoc($query3)){
               $crsnm=$result3['coursename'];
           }
             echo $crsnm; ?></td>
<td><?php $query4=mysqli_query($con,"SELECT * FROM `college` where collegeid='$clg'");
             while($result4=mysqli_fetch_assoc($query4)){
                $clgnm=$result4['collegename'];
            }
            echo $clgnm; ?></td>

            <?php }}else{
            ?>
<td>there is no data</td>
            <?php }?>
        </tr>
    </table>