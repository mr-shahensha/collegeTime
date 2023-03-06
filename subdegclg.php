<?php 
 include("logic/connection.php");
 include("logic/back.php");

if(isset($_POST['submit'])){
    
    $deg=$_REQUEST['degree'];
    $crs=$_REQUEST['crs'];
    $clg=$_REQUEST['clg'];
    $fees=$_REQUEST['fees'];

    $query0=mysqli_query($con,"select * from `deg_crs_clg` where degid='$deg' and crsid='$crs' and clgid='$clg'");
    while($result=mysqli_fetch_assoc($query0)){
        $degid=$result['degid'];
        $crsid=$result['crsid'];
        $clgid=$result['clgid']; 
    }
    if($deg==$degid && $crs==$crsid && $clg==$clgid){
        ?>
                <script>
            alert("this data already exist");
            document.location="degclg.php";
                </script>
        <?php
    }else{
        $query=mysqli_query($con,"INSERT INTO `deg_crs_clg` (`sid`, `degid`, `crsid`, `clgid`, `fee`) VALUES (NULL, '$deg', '$crs', '$clg', '$fees');");
    }

}
?>
<script>
    alert("succesfully inserted");
    //document.location="degclg.php";
</script>