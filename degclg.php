<?php include("logic/connection.php");
include("logic/back.php");
$idd=$_SESSION['id'];

?>
<!DOCTYPE html>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script>
        function fun(a)
        { 
            $('#crs').load('getcourse00.php?deg='+a).fadeIn('fast');
            if(a!=''){
                document.getElementById('demo1').innerHTML="";
            }
        }
        function validation()
        {           
            var clgvali=document.getElementById('clgvali').value;
            
            if(clgvali==''){
                text = "select college name";
                document.getElementById("demo").innerHTML = text;
                return false;
            }
            var degvali=document.getElementById('degvali').value;
            
            if(degvali==''){
                text = "select degree name";
                document.getElementById("demo1").innerHTML = text;
                return false;
            }
            
            var crsvali=document.getElementById('crsvali').value;
            
            if(crsvali==''){
                text = "select course name";
                document.getElementById("demo2").innerHTML = text;
                return false;
            }
            var fees=document.getElementById('fees').value;
            
            if(fees.length<=2){
                text = "Please enter your text";
                document.getElementById("demo3").innerHTML = text;
                return false;
            }
        }
        function hidewarn(a){
                        if(a!=''){
                            document.getElementById("demo").innerHTML = "";
                        }
        }
        function hidewarn2(a){
            if(a!=''){
                document.getElementById('demo2').innerHTML="";
            }           
        }
        function hidewarn3(a){
            if(a!=''){
                document.getElementById('demo3').innerHTML="";
            }               
        }
    </script>
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
    <title>Degree wise college</title>
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
<h1 style="color:red;">submit e problem ache</h1>
<!-- this is hero section -->
<section class="degree-hero">
    <!-- hero section part one -->
    <div class="part-one">
<form  action="subdegclg.php" method="post" onsubmit="return validation()">
<table border="1" >
<tr>
        <td>college</td>
        <td>
        <?php
if($_SESSION['lvl']==0){
$query6=mysqli_query($con,"SELECT * FROM `college` ");
}else{
    $query6=mysqli_query($con,"SELECT * FROM `college` where collegeid='$idd' ");
}
?>
        <select name="clg" id="clgvali" onchange="return hidewarn(this.value)">
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
    <tr>
        <td>degree</td>
        <td>
            <select name="degree" id="degvali" onchange="fun(this.value)" >
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
        <td>course</td>
        <td>
        <div class="course" id="crs">   
        <select name="crs" id="crsvali">
            <option value="">select course</option>
        </select>
        </div> 
    </td>
    </tr>
   
    <tr>
        <td>fees : </td>
        <td>
            <input type="text" placeholder="enter fees" name="fees" id="fees" onkeyup="return hidewarn3(this.value)">
        </td>
        
    </tr>
    <tr>
    <td colspan="2">
            <input style="margin-left:130px;" type="submit" value="submit" name="submit">
        </td>
    </tr>
</table>
<b><p id='demo' style="color:red;"></p></b>
<b><p id='demo1' style="color:red;"></p></b>
<b><p id='demo2' style="color:red;"></p></b>
<b><p id='demo3' style="color:red;"></p></b>

</form>
</div>
    
    <!-- hero section part two -->
    <div class="part-two">
<div class="showdata">
<table>
<tr>
    <td><b>sid</b></td>
    <td><b>degree</b></td>
    <td><b>course</b></td>
    <td><b>college</b></td>
    <td><b>fees</b></td>
    <?php 
        if($_SESSION['lvl']==0){
        ?>
    <td><b>delete</b></td>
    </tr>
    <?php }else{}?>

</tr>

<?php 
    $query3=mysqli_query($con,"SELECT * FROM `deg_crs_clg`");
    $total3=mysqli_num_rows($query3);
    $f=0;
    if($total3!=0){
    while($result3=mysqli_fetch_assoc($query3)){
        $deg2=$result3['degid'];
        $crs2=$result3['crsid'];
        $clgid2=$result3['clgid'];
        $fee=$result3['fee'];
        $sid=$result3['sid'];
        $f++;
        ?>
        <tr>
        <td><?php echo $f;?></td>
            <td><?php
             $query4=mysqli_query($con,"SELECT * FROM `degree` where degreeid='$deg2'");
             while($result4=mysqli_fetch_assoc($query4)){
                $degnm2=$result4['degreename'];
            }
             echo $degnm2; 
            ?></td>

            <td><?php
            $query5=mysqli_query($con,"SELECT * FROM `course` where courseid='$crs2'");
            while($result5=mysqli_fetch_assoc($query5)){
               $crsnm3=$result5['coursename'];
           }
             echo $crsnm3; 
             ?></td>

            <td><?php 
             $query6=mysqli_query($con,"SELECT * FROM `college` where collegeid='$clgid2'");
             while($result6=mysqli_fetch_assoc($query6)){
                $clgnm2=$result6['collegename'];
            }
            echo $clgnm2; 
            ?></td>

            <td><?php
             echo $fee; 
             ?></td>
              <?php 
        if($_SESSION['lvl']==0){
        ?>
             <td><a href="delete/deldegclg.php?sid=<?php echo $sid;?>"><i class="fa-solid fa-trash-can"></i></a></td>
             <?php }else{}?>

</tr>
<?php
    }
}else{
?>
<tr><td>there is no data</td></tr>
<?php
}
    ?>
</table>
</div>
</div>
</section>
    
     <!-- this is footer section -->
     <?php include("footer.php");?>
</body>
</html>