<?php 
 include("logic/connection.php");
 include("logic/back.php");
$idd=$_SESSION['id'];
?>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/degree.css">
    <!-- fontawsome link -->
    <script src="https://kit.fontawesome.com/dce4936410.js" crossorigin="anonymous"></script>
     <!-- google font -->
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
    </style>
    <title>Notification</title>
    <script>
        function status(stat,stud,sid){
            if(confirm('are you sure ?')){
               $('#status'+stud).load('statedit.php?stat='+stat+'&stud='+stud+'&sid='+sid).fadeIn('fast');
            }
            }
    </script>
</head>
<body>
    <!-- this is header -->
    <Header>
        <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
    </header>
 <!-- this is hello section -->
<section class="hello">
<h1>Notification page</h1>
</section>
<!-- this is hero section -->
<section class="degree-hero">
    <!-- hero section part one -->
    <div class="part-one">
    <table>
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
    </div>
    </section>
    <!-- this is footer section -->
    <?php include("footer.php");?>
</body>
</html>
