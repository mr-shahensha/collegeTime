
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>

</head>
<body>
    <!-- <a href="index.php"><-home</a> -->
    <?php 
        if($_SESSION['lvl']==10){
          $query3=mysqli_query($con,"SELECT * FROM `college` where collegeid='$idd'");
            while($result3=mysqli_fetch_assoc($query3)){
               $clgnm=$result3['collegename'];
           }
           ?>
                       <!-- <h1>Hello <?php //echo $clgnm;?></h1> -->
        <?php
        }
        else if ($_SESSION['lvl']==0){
            // echo "<h1>Hello Admin</h1>";
            $query2=mysqli_query($con,"SELECT * FROM `signup` where id='$idd'");
            while($result2=mysqli_fetch_assoc($query2)){
               $id=$result2['id'];
            }
        }else{ 
          $query3=mysqli_query($con,"SELECT * FROM `student` where myid='$idd'");
            while($result3=mysqli_fetch_assoc($query3)){
               $myid=$result3['myid'];
               $name=$result3['name'];
               $number=$result3['number'];
               $dob=$result3['dateofbirth'];
               $degree=$result3['degree'];
               $course=$result3['course'];
               $college=$result3['college'];
               $session=$result3['session'];
               $fee=$result3['fee'];

           }
           ?>
             <!-- <h1>Hello <?php //echo $name;?></h1> -->
            <?php
            }
            ?>

            <!-- form started -->

    <form action="" method="post">
        <table border="2">
            <!-- id -->
            <tr>
                <td>
                    MyId
                </td>
                <td>
                    <?php 
                     if($_SESSION['lvl']==0){
                    ?>
                <?php echo $id;?>
                <?php }else if($_SESSION['lvl']==10){?>
                <?php echo $idd;?>
                <?php }else {
                ?>
                <?php echo $myid;?>
                <?php }?>
                </td>
            </tr>

            <!-- name -->
            <?php 
                if($_SESSION['lvl']==5){
            ?>
            <tr>
                <td>
                    name
                </td>
                <td>
                    <?php echo $name;?>
                </td>
            </tr>
                    <!-- photo -->
                    <tr>
                <td>
                    photo
                </td>
                <td>
                <a href="showpic.php?myid=<?php echo $idd;?>" target="#" title="Click to View Full"><img src="student/<?php echo $idd;?>/student_pic.png" style="height:70px;width:70px;" alt=""></a>
                   
            </td>
            </tr>
            <!-- number -->
            
            <tr>
                <td>
                    number
                </td>
                <td>
                <?php echo $number;?>
                </td>
            </tr>

             <!-- DOB -->
           
            <tr>
                <td>
                    date of birth
                </td>
                <td>
                <?php echo $dob;?>
                </td>
            </tr>
            <?php }?>

            <!-- degree -->

            <tr>
                <td>
                    degree
                </td>
                <td>
                <?php 
                if($_SESSION['lvl']==0 ||$_SESSION['lvl']==10 ){
                    if($_SESSION['lvl']==0){
                         $query=mysqli_query($con,"SELECT * FROM `degree`");
                    }else if($_SESSION['lvl']==10){
                        $query=mysqli_query($con,"SELECT * FROM `deg_crs_clg` where clgid='$idd'");
                    }
                    $total=mysqli_num_rows($query);
                        if($total!=0){
                            $f=0;
                while($result=mysqli_fetch_assoc($query))
                {
                    $f++;
                }
            }
            ?>
                <?php echo $f;?>
                <?php }else{?>
                    <?php
                         $query4=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$degree'");
                         while($result4=mysqli_fetch_assoc($query4)){
                            $degname=$result4['degreename'];
                         }
                        echo $degname;?>

                    <?php }?>
                </td>
            </tr>

            <!-- course -->

            <tr>
                <td>
                    course
                </td>
                <td>
                <?php 
            if($_SESSION['lvl']==0 ||$_SESSION['lvl']==10 ){
                if($_SESSION['lvl']==0){
                     $query=mysqli_query($con,"SELECT * FROM `course`");
                }else if($_SESSION['lvl']==10){
                    $query=mysqli_query($con,"SELECT * FROM `deg_crs_clg` where clgid='$idd'");
                }
                $total=mysqli_num_rows($query);
                    if($total!=0){
                        $f=0;
            while($result=mysqli_fetch_assoc($query))
            {
                $f++;
            }
        }
            ?>
                <?php echo $f;?>
                <?php }else{?>
                    <?php
                         $query5=mysqli_query($con,"SELECT * FROM `course` where courseid='$course'");
                         while($result5=mysqli_fetch_assoc($query5)){
                            $crsname=$result5['coursename'];
                         }
                        echo $crsname;?>

                    <?php }?>
                </td>
            </tr>

            <!-- College -->
            <?php if($_SESSION['lvl']==0 ||$_SESSION['lvl']==5 ){?>
            <tr>
                <td>
                    college
                </td>
                <td>
                <?php 
                if($_SESSION['lvl']==0){
                    $query=mysqli_query($con,"SELECT * FROM `college`");
                    $total=mysqli_num_rows($query);
                        if($total!=0){
                            $f=0;
                while($result=mysqli_fetch_assoc($query))
                {
                    $f++;
                }
            }
            ?>
                <?php echo $f;?>
                <?php }else{?>
                    <?php
                         $query6=mysqli_query($con,"SELECT * FROM `college` where collegeid='$college'");
                         while($result6=mysqli_fetch_assoc($query6)){
                            $clgname=$result6['collegename'];
                         }
                        echo $clgname;?>

                    <?php }?>
                </td>
            </tr>
            <?php }?>

                <!-- Student -->

            <?php 
                if($_SESSION['lvl']==0 ||$_SESSION['lvl']==10 ){
            ?>
            <tr>
                <td>
                    student
                </td>
                <td>
                <?php 
                if($_SESSION['lvl']==0){
                    $query2=mysqli_query($con,"SELECT * FROM `student`");
                }else if($_SESSION['lvl']==10){
                    $query2=mysqli_query($con,"SELECT * FROM `student` where college='$idd'");
                }
                    $total2=mysqli_num_rows($query2);
                        if($total2!=0){
                            $f=0;
                while($result2=mysqli_fetch_assoc($query2))
                {
                    $f++;
                }}
            ?>
              <?php echo $f;?>
                </td>
            </tr>

            <!-- Session -->
            <?php 
                }
                if($_SESSION['lvl']==5){
            ?>

            <tr>
                <td>
                    session
                </td>
                <td>
               <?php echo $session;?>
                </td>
            </tr>

            <!-- Fee -->

            <tr>
                <td>
                    fee
                </td>
                <td>
               <?php echo $fee;?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php 
                    $reqquery=mysqli_query($con,"SELECT status FROM `request` where stud_id='$idd'");
                    $total=mysqli_num_rows($reqquery);
                    while($reqres=mysqli_fetch_assoc($reqquery)){
                        $status=$reqres['status'];
                     }
                     if($total!=0 && $status==1){
                        echo "<h5 style='color:green;'>Request submitted</h5>";
                     }else{
?>
                <a href="updtpro.php">update profile</a>
                <?php  }
                    ?>
                </td>
                <?php }?>
                <td>
                <?php 
                
                if($_SESSION['lvl']==5){
            ?>
                 <a href="">download icard</a>
                 <?php } else {?>
                    <a href="download.php">download data</a>
                    <?php }?>
                </td>
            </tr>
            <tr>
            <td>
                <a href="password.php">change password</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>