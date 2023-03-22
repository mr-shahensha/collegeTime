<?php
 include("logic/connection.php");
 include("logic/back.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/degree.css">
    <!-- fontawsome link -->
    <script src="https://kit.fontawesome.com/dce4936410.js" crossorigin="anonymous"></script>
     <!-- google font -->
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
    </style>
    <title>Degree-College</title>
    <script>
          function validation() {
    var crs = document.getElementById('crs').value;
    var deg = document.getElementById('deg').value;
    
    if(deg.length =='' ) {
        let text;
                // alert("degree should be more than 1 character");
                //document.getElementById('nm').innerHTML=" name should be more than 1 character";
                text = "Select a degree";
                document.getElementById("demo").innerHTML = text;
                return false;
            }
            if(crs.length =='' ) {
                let text2;
                // alert("degree should be more than 1 character");
                //document.getElementById('nm').innerHTML=" name should be more than 1 character";
                text2 = "Select a course";
                document.getElementById("demo2").innerHTML = text2;
                return false;
            }
        }
        function hidewarn(a){
            if(a!=''){
            //     text = "Select a degree";
            //     document.getElementById("demo").innerHTML = text;
            // }else{
                document.getElementById("demo").innerHTML = "";
            }
        }
        function hidewarn2(a){
            if(a!=''){
                document.getElementById("demo2").innerHTML = "";
            }     
           }
    </script>
</head>
<body>
        <!-- this is header -->
<Header>
        <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
</header>

<!-- this is hello section -->
<section class="hello">
<h1>degree page</h1>
</section>

    <!-- this is hero section -->
<section class="degree-hero">
    <!-- hero section part one -->
    <div class="part-one">
<form action="subdegcrs.php" method="post"  onsubmit="return validation()">
<table>

<tr>
    <td>degree :</td>
    <td><select name="degid" id="deg" onchange='return hidewarn(this.value)'>
    <option value="">select degree</option>
    <?php 
     $query=mysqli_query($con,"SELECT * FROM `degree`");
 while($result=mysqli_fetch_assoc($query)){
    $degid=$result['degreeid'];
    $degnm=$result['degreename'];

    ?>
    <option value="<?php echo $degid; ?>"><?php echo $degnm;?></option>
    <?php
 }
    ?>
    </select>
    </td>
</tr>
<tr>
    <td>course :</td>
    <td><select name="crs" id="crs" onchange='return hidewarn2(this.value)'>
    <option value="">select course</option>
    <?php 
     $query1=mysqli_query($con,"SELECT * FROM `course`");
 while($result1=mysqli_fetch_assoc($query1)){
    $crsid=$result1['courseid'];
    $crsnm=$result1['coursename'];

    ?>
    <option value="<?php echo $crsid; ?>"><?php echo $crsnm;?></option>
    <?php
 }
    ?>
    </select></td>
    <td><input type="submit" name="submit"value="submit"></td>
</tr>

</table>
<b><p id='demo' style="color:red;"></p></b>
<b><p id='demo2' style="color:red;"></p></b>

</form>
</div>
    
    <!-- hero section part two -->
    <div class="part-two">
<table>
    <tr>
        <td>sid</td>
        <td>degree</td>
        <td>course</td>
        <td>delete</td>
    </tr>
    
        <?php
        $query2=mysqli_query($con,"SELECT * FROM `deg_crs`");
        $total2=mysqli_num_rows($query2);
            if($total2!=0){
                $f=0;
    while($result2=mysqli_fetch_assoc($query2)){
        $sid=$result2['sid'];
        $crsid=$result2['crsid'];
        $degid=$result2['degid'];
        $f++;
        ?>
        <tr>
        <td><?php echo $f; ?></td>
<td>
    <?php
$query3=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$degid'");
while($result3=mysqli_fetch_assoc($query3)){
    $degnm1=$result3['degreename'];
}
echo $degnm1;
?>
</td>
<td><?php
 $query4=mysqli_query($con,"SELECT * FROM `course` where courseid='$crsid'");
while($result4=mysqli_fetch_assoc($query4)){
    $crsnm1=$result4['coursename'];
}
echo $crsnm1; 
?></td>
<td><a href="delete/deldegcrs.php?sid=<?php echo $sid;?>"><i class="fa-solid fa-trash-can"></i></a></td>
    </tr>
    <?php
}
        }else{
            ?>
      <tr><td> there is no data</td></tr>
            <?php
        }
        ?>
</table>
</div>
</section>
 <!-- this is footer section -->
 <?php include("footer.php");?>
</body>
</html>