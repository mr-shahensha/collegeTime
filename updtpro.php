<?php 
 include("logic/connection.php");
 include("logic/back.php");
$idd=$_SESSION['id'];
    $query3=mysqli_query($con,"select * from student where myid='$idd'");
    while($result=mysqli_fetch_assoc($query3)){
        $name=$result['name'];
        $number=$result['number'];
        $dob=$result['dateofbirth'];
        $clgid=$result['college'];
    }
?>

<form action="" method="post">
    <table border="2">
        <tr>
            <td>
                name
            </td>
            <td>
                <input type="text" value="<?php  echo $name;?>" name="name" id="name" required>
            </td>
        </tr>
        <tr>
            <td>
                photo
            </td>
            <td>
                <img src="student/<?php echo $idd;?>/student_pic.png" style="height:100px;width:100px;" name="photo" id="photo">
                <form action="" method="post">
                    <input type="submit" value="delete" name="submit">
                </form>
            </td>
        </tr>
        <tr>
            <td>
                phone number
            </td>
            <td>
            <input type="text" value="<?php  echo $number;?>" name="number" id="number" required>
            </td>
        </tr>
        <tr>
            <td>
                date of birth
            </td>
            <td>
            <input type="date" value="<?php  echo $dob;?>" name="dob" id="dob" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit" name="submit">
            </td>
        </tr>
    </table>
</form>
<?php 
    if(isset($_POST['submit'])){
        $nm=$_REQUEST['name'];
        $num=$_REQUEST['number'];
        $dob=$_REQUEST['dob'];
        date_default_timezone_set("asia/kolkata");
        $datetime = date('d/m/Y h:i:s a', time());
        $query4=mysqli_query($con,"INSERT INTO `request` (`sid`, `stud_id`,`clgid`, `name`, `number`, `dateofbirth`, `status`,`reqdate`) VALUES (NULL, '$idd','$clgid', '$nm', '$num', '$dob', '1','$datetime'); ");

        ?>
        <script>
             alert("update successfully")
             document.location="profile.php";
        </script>
        <?php
    }
?>