<?php 
include("connection.php");
include("back.php");
$stud_id=$_REQUEST['stud_id'];
$query3=mysqli_query($con,"SELECT * FROM `student` where myid='$stud_id'");
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
$query4=mysqli_query($con,"SELECT * FROM `request` where stud_id='$stud_id'");
while($result=mysqli_fetch_assoc($query4)){
    $newname=$result['name'];
    $newnumber=$result['number'];
    $newdob=$result['dateofbirth'];
    $sid=$result['sid'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>

    <script>
         function status(stat,stud,sid){
            if(confirm('are you sure ?')){
               $('#status'+stud).load('statedit.php?stat='+stat+'&stud='+stud+'&sid='+sid).fadeIn('fast');
            }
            document.location="index.php"; 
            }
    </script>
</head>
<body>
<a href="notification.php"><-back</a>
    <br><br>
    <table border="2">
            <!-- id -->
            <tr>
                <td>
                    MyId
                </td>
                <td>
                <?php echo $myid;?>
                </td>
                <td style="color:green;">
                    Change request
                </td>
            </tr>
            <tr>
                <td>
                    name
                </td>
                <td>
                    <?php echo $name;?>
                </td>
                <td>
                    <?php echo $newname;?>
                </td>
            </tr>
                    <tr>
                <td>
                    photo
                </td>
                <td>
                <a href="showpic.php?myid=<?php echo $myid;?>" target="#" title="Click to View Full"><img src="student/<?php echo $myid;?>/student_pic.png" style="height:70px;width:70px;" alt=""></a>  
            </td>
            <td>
                <a href="showpic.php?myid=<?php echo $myid;?>" target="#" title="Click to View Full"><img src="student/<?php echo $myid;?>/student_pic.png" style="height:70px;width:70px;" alt=""></a>  
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
                <td>
                <?php echo $newnumber;?>
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
                <td>
                <?php echo $newdob;?>
                </td>
            </tr>

            <tr>
                <td>
                    degree
                </td>
                <td>
       
                    <?php
                         $query4=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$degree'");
                         while($result4=mysqli_fetch_assoc($query4)){
                            $degname=$result4['degreename'];
                         }
                        echo $degname;?>
                </td>
            </tr>

            <!-- course -->

            <tr>
                <td>
                    course
                </td>
                <td>
                    <?php
                         $query5=mysqli_query($con,"SELECT * FROM `course` where courseid='$course'");
                         while($result5=mysqli_fetch_assoc($query5)){
                            $crsname=$result5['coursename'];
                         }
                        echo $crsname;?>
                </td>
            </tr>
            <tr>
                <td>
                    college
                </td>
                <td>
                    <?php
                         $query6=mysqli_query($con,"SELECT * FROM `college` where collegeid='$college'");
                         while($result6=mysqli_fetch_assoc($query6)){
                            $clgname=$result6['collegename'];
                         }
                        echo $clgname;?>
                </td>
            </tr>
            <tr>
                <td>
                    session
                </td>
                <td>
               <?php echo $session;?>
                </td>
            </tr>
                </table>
                <br>
                <table border="2">
                <tr>
                <td>Your response to the request : </td>
            <td>
            <div id="status<?php  echo $stud_id;?>">
                        <input type="button" style="color:green;" value="accept" onclick="return status('2','<?php echo $stud_id; ?>','<?php echo $sid; ?>')" >
                        <input type="button" style="color:red;" value="rejected" onclick="return status('-1','<?php echo $stud_id; ?>','<?php echo $sid; ?>')" >
                    </div>
                    
                </td>
            </tr>
                </table>

</body>
</html>