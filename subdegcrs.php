<?php 
// include("connection.php");
//     if(isset($_POST['submit'])){
//         $crs=$_REQUEST['crs'];
//         $deg=$_REQUEST['degid'];

//         $query=mysqli_query($con,"Select * from deg_crs");
//         while($result=mysqli_fetch_assoc($query)){
//             $degid=$result['degid'];
//             $crsid=$result['crsid'];
//         }
//         if($crs==$crsid && $deg==$degid){
            ?>
                <script>
                    // alert("this data already exist");
                    // document.location="degcourse.php";

                </script>
            <?php 
        // }else{
        //     $query1=mysqli_query($con,"INSERT INTO `deg_crs` (`sid`, `degid`, `crsid`) VALUES (NULL, '$deg', '$crs'); ");
        // }
        //     }
    ?>
<script>
    //alert("succesfully inserted");
    // document.location="degcourse.php";

</script>

<?php 
include("connection.php");
if(isset($_POST['submit'])){
    $crs=$_REQUEST['crs'];
    $deg=$_REQUEST['degid'];
    $query=mysqli_query($con,"select * from deg_crs ");
    while($result=mysqli_fetch_assoc($query)){
        $degid=$result['degid'];
        $crsid=$result['crsid'];
    }
    if($crs==$crsid && $deg==$degid){
        ?>
    <script>
        alert("this data is already exsist!");
        document.location="degcourse.php";
    </script>
        <?php
    } else{
        $query2=mysqli_query($con,"INSERT INTO `deg_crs` (`sid`, `degid`, `crsid`) VALUES (NULL, '$deg', '$crs');");
    }
}
?>
   <script>
        alert("data inserted!");
        //document.location="degcourse.php";
    </script>