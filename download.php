<?php 
 include("logic/connection.php");
 include("logic/back.php");
$idd=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script>

function fun(a){
        $('#deg').load('getdegree.php?a='+a).fadeIn('fast');
        $('#searchdata').load('tblclg.php?clg='+a).fadeIn('fast');
        if(a==0){
            document.location.reload(); 
        }
    }
    function fun2(deg,clg){
        $('#crs').load('getcourse.php?clg='+clg+'&deg='+deg).fadeIn('fast');
        $('#searchdata').load('tbldeg.php?deg='+deg+'&clg='+clg).fadeIn('fast');
        if(deg==0){
            document.location.reload(); 
        }
    }
    function fun3(crs,clg,deg){
        // alert(clg);
        $('#searchdata').load('tblcrs.php?deg='+deg+'&clg='+clg+'&crs='+crs).fadeIn('fast');
        if(crs==0){
            document.location.reload(); 
        }
    }
</script> 
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/degree.css">
    <!-- fontawsome link -->
    <script src="https://kit.fontawesome.com/dce4936410.js" crossorigin="anonymous"></script>
     <!-- google font -->
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
    </style>
    <title>Download</title>
</head>
<body>
    <!-- this is header -->
    <Header>
        <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
    </header>
 <!-- this is hello section -->
<section class="hello">
<h1>download page</h1>
</section>
<?php
if($_SESSION['lvl']==0){
$query6=mysqli_query($con,"SELECT * FROM `college` ");
}else{
    $query6=mysqli_query($con,"SELECT * FROM `college` where collegeid='$idd' ");
}
?>
<!-- this is hero section -->
<section class="degree-hero">
    <!-- hero section part one -->
    <div class="part-one">
<form action="downloadexl.php" method="post">
    <table>
        <tr>
            <td>
            <select name="clg" id="clg" onchange="fun(this.value)">
            <?php if($_SESSION['lvl']==0){?>
        <option value="">select college</option>
   
        <?php
            }
            while($result6=mysqli_fetch_assoc($query6)){
                $clgnm2=$result6['collegename'];
                $clgid=$result6['collegeid'];
        ?>
        <option value="<?php echo $clgid;?>"><?php echo $clgnm2;?></option>
        <?php
}
  ?> 
    </select>
            </td>
            <td>
            <div id='deg'>  
            <?php  
            if($_SESSION['lvl']==0){
            ?>
        <select name="deg" id="deg">
        <option value="">select degree</option>
        </select>
            <?php } else{?>
   <!-- here start user      -->
<select name="deg" id="deg"onchange="fun2(this.value,'<?php echo $clgid;?>')">
    <option value="">select degree</option>
    <?php 
     $query=mysqli_query($con,"SELECT Distinct degid  FROM `deg_crs_clg` where clgid='$clgid'");
 while($result=mysqli_fetch_assoc($query)){
    $degid=$result['degid'];
    ?>
    <option value="<?php echo $degid; ?>">
    <?php
     $query2=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$degid'");
     while($result2=mysqli_fetch_assoc($query2)){
        $degnm=$result2['degreename'];
    
    echo $degnm;
     }?></option>
    <?php
 }
    ?>
    </select>
    <?php } ?>
       <!-- here end user      -->

        </div>
        </td>
            <td><div class="crs" id="crs">
        <select name="crs" id="crs">
            <option value="">select course</option>
        </select>
        </div></td>
        </tr>
        <tr>
            <td>
                <input style="width:310px" type="submit" value="download excel sheet">
            </td>
        </tr>
    </table>
    </form>
       <!-- hero section part two -->
       <div class="part-two">
    <div id="searchdata">
    <table border="1">
        <tr>
            <td><b>sid</b></td>
            <td><b>name</b></td>
            <td><b>number</b></td>
            <td><b>degree</b></td>
            <td><b>course</b></td>
            <td><b>college</b></td>
        </tr>
        <tr>
            <?php 

if($_SESSION['lvl']==0){
    $query=mysqli_query($con,"SELECT * FROM `student` ");
}else{
        $query=mysqli_query($con,"SELECT * FROM `student` where college='$idd' ");
    }



            $total=mysqli_num_rows($query);
            if($total!=0){
                $f=0;
                while($result=mysqli_fetch_assoc($query)){
                    $deg=$result['degree'];
                    $name=$result['name'];
                    $crs=$result['course'];
                    $clg=$result['college'];
                    $number=$result['number'];
                    $f++;
                
            ?>
            <tr>
<td><?php echo $f;?></td>
<td><?php echo $name;?></td>
<td><?php echo $number;?></td>
<td><?php
$query2=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$deg'");
while($result2=mysqli_fetch_assoc($query2)){
   $degnm=$result2['degreename'];
}
echo $degnm; ?></td>
<td><?php  $query3=mysqli_query($con,"SELECT * FROM `course` where courseid='$crs'");
            while($result3=mysqli_fetch_assoc($query3)){
               $crsnm=$result3['coursename'];
           }
             echo $crsnm; ?></td>
<td><?php $query4=mysqli_query($con,"SELECT * FROM `college` where collegeid='$clg'");
             while($result4=mysqli_fetch_assoc($query4)){
                $clgnm=$result4['collegename'];
            }
            echo $clgnm; ?></td>


            <?php }}else{
            ?>
<td>there is no data</td>
            <?php }?>
        </tr>
    </table>
    </div>
    </div>
    </section>
    <!-- this is footer section -->
    <?php include("footer.php");?>
</body>
</html>