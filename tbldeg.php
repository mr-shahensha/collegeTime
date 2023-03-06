<?php 
 include("logic/connection.php");
 $degid=$_REQUEST['deg'];
$clgid=$_REQUEST['clg'];
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
          
          $query=mysqli_query($con,"SELECT * FROM `student` where degree='$degid' and college='$clgid'");
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