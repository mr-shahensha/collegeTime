<?php 
 include("logic/connection.php");
 if(isset($_POST['submit'])){
        $clgnm=$_REQUEST['clgnm'];
        $f=0;
        $query1=mysqli_query($con,"  SELECT * FROM `college` ")or die(mysqli_error());
        while($result=mysqli_fetch_array($query1)){
            $f++;
        }
    $query=mysqli_query($con,"INSERT INTO `college` (`sid`, `collegeid`, `collegename`) VALUES (NULL, 'clg$f', '$clgnm'); ");
    
    date_default_timezone_set("asia/kolkata");
                $datetime = date('d/m/Y', time());
    $query2=mysqli_query($con,"INSERT INTO `signup` (`sid`, `id`, `password`, `date`, `lvl`) VALUES (NULL, 'clg$f', 'clg$f', '$datetime', '10');");
    }
    ?>
<script>
    alert("succesfully inserted");
    document.location="college.php";

</script>