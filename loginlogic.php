<?php 
include("connection.php");
if(isset($_POST['submit'])){
    $id=$_REQUEST['id'];
    $pass=$_REQUEST['pass'];
    $query=mysqli_query($con,"select * from signup where id='$id'")or die(mysqli_error());
    while($result=mysqli_fetch_array($query)){
        $password=$result['password'];
        $lvl=$result['lvl'];
    }
    if($pass==$password){
        date_default_timezone_set("asia/kolkata");
                        $datetime = date('d/m/Y h:i:s a', time());
                        $query2=" update `signup` set  `last_login`='$datetime' where id='$id'";
                        $data2=mysqli_query($con,$query2);
                        
                        session_start();
                        session_unset();
                        $_SESSION['id']=$id;
                        $_SESSION['lvl']=$lvl;
        ?>
    <script>
        document.location='index.php';
    </script>
        <?php
    }else{
        ?>
<script>
        alert("password or id maybe wrong");
        document.location='login.php';
    </script>
        <?php
    }
}

?>