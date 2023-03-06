<?php 
 include("logic/connection.php");
 include("logic/back.php");
$idd=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <table border="2" >
    <?php 
        if($_SESSION['lvl']==0){
            echo "<h1>Hello Admin</h1>";
        ?>
<tr>
            <td>
                <a href="degree.php">degree</a>
            </td>
            <td>  
                 <a href="course.php">course</a>
            </td>
            <td>
            <a href="college.php">college</a>
            </td>
        </tr>
        <?php }
        else if($_SESSION['lvl']==10){

             $query3=mysqli_query($con,"SELECT * FROM `college` where collegeid='$idd'");
            while($result3=mysqli_fetch_assoc($query3)){
               $clgnm=$result3['collegename'];
           }
           ?>
            <h1>Hello <?php echo $clgnm;?></h1>
            <?php }
            if($_SESSION['lvl']==10 || $_SESSION['lvl']==0){
            
            ?>
        <tr>
            <td><a href="degcourse.php">degree wise course</a></td>
            <td><a href="degclg.php">degree wise college</a></td>
            <td><a href="stud.php">submit student</a></td>
        </tr>
        <tr>
            <td>
                <a href="download.php">download data</a>
            </td>
            <td>
                <a href="search.php">search</a>
            </td>
        <?php
            }
     if($_SESSION['lvl']==5)  { 
          $query3=mysqli_query($con,"SELECT * FROM `student` where myid='$idd'");
            while($result3=mysqli_fetch_assoc($query3)){
               $nm=$result3['name'];
           }
           ?>
             <h1>Hello <?php echo $nm;?></h1>
            <?php
            }
            ?>
            <td>
            <a href="profile.php">Profile</a> 
            </td>
        </tr>
        <tr>
        <?php 
            if($_SESSION['lvl']==10 || $_SESSION['lvl']==5){
            ?>
        <td><a href="notification.php">Notification</a></td>
        <?php }?>
        <td><a href="logic/logout.php">logout</a></td>
        </tr>
    </table>

</body>
</html>