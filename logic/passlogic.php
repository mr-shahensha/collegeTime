<?php 
    include("connection.php");
    include("back.php");
    $idd=$_SESSION['id'];
      if(isset($_POST['submit'])){
        $oldpass=$_REQUEST['oldpass'];
        $newpass=$_REQUEST['newpass'];
        $conpass=$_REQUEST['conpass'];

        $query=mysqli_query($con,"select * from signup where id='$idd'");
        while($result=mysqli_fetch_array($query)){
            $olddpass=$result['password'];
        }
        if($oldpass==$olddpass){
            if($newpass==$conpass){
                $query2=mysqli_query($con,"UPDATE `signup` SET `password` = '$newpass' WHERE `signup`.`id` = '$idd' ");

                ?>
                <script>
                     alert("password succesfully updated");
                document.location="../profile.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert('password and confirm password doesnot match');
                    window.history.go(-1);
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert('old password doesnot match');
                window.history.go(-1);
            </script>
            <?php
        }

      }

    ?>