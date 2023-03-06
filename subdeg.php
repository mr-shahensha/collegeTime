<?php 
 include("logic/connection.php");
 if(isset($_POST['submit'])){
        $degnm=$_REQUEST['degnm'];
        $f=0;
        $query1=mysqli_query($con,"  SELECT * FROM `degree` ")or die(mysqli_error());
        while($result=mysqli_fetch_array($query1)){
            $f++;
        }
    $query=mysqli_query($con,"INSERT INTO `degree` (`sid`, `degreeid`, `degreename`) VALUES (NULL, 'deg$f', '$degnm'); ");
}
    ?>
<script>
    alert("succesfully inserted");
    document.location="degree.php";

</script>