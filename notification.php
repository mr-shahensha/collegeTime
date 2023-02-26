<?php 
include("connection.php");
include("back.php");
$idd=$_SESSION['id'];
?>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <script>
        function status(stat,stud,sid){
            if(confirm('are you sure ?')){
               $('#status'+stud).load('statedit.php?stat='+stat+'&stud='+stud+'&sid='+sid).fadeIn('fast');
            }
            }
    </script>
</head>
<body>
<a href="index.php"><-home</a>
<br><br>
    <table border="2">
        <tr>
            <td>
               <b>Your notifications</b> 
            </td>
            <td><b>status</b></td>
            <td><b>date</b></td>
            </tr>
            <?php
            if($_SESSION['lvl']==10){

             $query=mysqli_query($con,"select * from request where clgid='$idd'");
                 while($result=mysqli_fetch_assoc($query)){
                     $status=$result['status'];
                     $stud_id=$result['stud_id'];
                $sid=$result['sid'];
                $reqdate=$result['reqdate'];
                if($status==1){
                    ?>
                     <tr>
                    <td>
                       <a href="studpro.php?stud_id=<?php echo $stud_id;?>"><?php echo "<b>".$stud_id."</b>"?></a> make a request for update profile
                    </td>
                    <td>
                        <div id="status<?php  echo $stud_id;?>">
                        <input type="button" style="color:green;" value="accept" onclick="return status('2','<?php echo $stud_id; ?>','<?php echo $sid; ?>')" >
                        <input type="button" style="color:red;" value="rejected" onclick="return status('-1','<?php echo $stud_id; ?>','<?php echo $sid; ?>')" >
                    </div>
                </td>
                <td><?php echo $reqdate;?></td>
                    </tr>
                    <?php
                }
            }
            }
            if($_SESSION['lvl']==5){
            $query1=mysqli_query($con,"select * from request where stud_id='$idd'");
            $total=mysqli_num_rows($query1);
            if($total!=0){
                 while($result1=mysqli_fetch_assoc($query1)){
                     $status=$result1['status'];
                     $stud_id=$result1['stud_id'];
                     $reqdate=$result1['reqdate'];
                 ?>
                 <tr>
                <td>your request is </td>
                <?php 
                if($status==1){?>
                <td style="color:blue;">Pending</td>
                <?php } else if($status==2){?>
                    <td style="color:green;">Accepted</td>
                    <?php } else if($status==-1){?>
                        <td style="color:red;">Rejected / no request</td>
                    <?php }?>
                    <td><?php echo $reqdate;?></td>
            </tr>
            <?php }}
            else{
                echo "You have no notification";
             }}?>
    </table>
</body>
</html>
