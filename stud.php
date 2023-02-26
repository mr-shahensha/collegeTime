<?php
include("back.php");
include("connection.php");
$idd=$_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script>
    function fun(a){
        $('#deg').load('getdegree.php?a='+a).fadeIn('fast');
        $('#crs').load('getcourse.php?clg=0&deg=0').fadeIn('fast');
        $('#fee').load('getfee.php?clg=0&deg=0&crs=0').fadeIn('fast');
        if(a!=""){
        document.getElementById("demo").innerHTML = "";
        }
    }
    function fun2(deg,clg){
        $('#crs').load('getcourse.php?clg='+clg+'&deg='+deg).fadeIn('fast');
        $('#fee').load('getfee.php?clg=0&deg=0&crs=0').fadeIn('fast');
        if(deg!=""){
        document.getElementById("demo2").innerHTML = "";
        }
    }
    function fun3(crs,clg,deg){
        // alert(clg);
        if(crs==''){
            $('#fee').load('getfee.php?clg=0&deg=0&crs=0').fadeIn('fast');
        }
        else if(crs!=''){
            document.getElementById("demo3").innerHTML = "";
            $('#fee').load('getfee.php?clg='+clg+'&deg='+deg+'&crs='+crs).fadeIn('fast');
        }
   }

   function validation(){
        var clgvali=document.getElementById('clgvali').value;
        if(clgvali==''){
            text = "select college name";
                document.getElementById("demo").innerHTML = text;
                return false;
        }
        
        var degvali=document.getElementById('degvali').value;
        if(degvali==''){
            text = "select degree name";
                document.getElementById("demo2").innerHTML = text;
                return false;
        }
        var crsvali=document.getElementById('crsvali').value;
        if(crsvali==''){
            text = "select course name";
                document.getElementById("demo3").innerHTML = text;
                return false;
        }
        var ssnvali=document.getElementById('ssnvali').value;
        if(ssnvali==''){
            text = "select session";
                document.getElementById("demo4").innerHTML = text;
                return false;
        }
        var name=document.getElementById('name').value;
        if(name.length<2){
            text = "enter name";
                document.getElementById("demo5").innerHTML = text;
                return false;
        }
        var dob=document.getElementById('dob').value;
        if(dob.length<2){
            text = "select date of birth";
                document.getElementById("demo6").innerHTML = text;
                return false;
        }
        var number=document.getElementById('number').value;
        if(number.length<9){
            text = "enter number";
                document.getElementById("demo7").innerHTML = text;
                return false;
        }
   }
   function hidewarn(a){
    if(a!=''){
        document.getElementById("demo4").innerHTML = "";
    }
   }
   function hidewarn2(a){
    if(a!=''){
        document.getElementById('demo5').innerHTML="";
    }
   }
   function hidewarn3(a){
    if(a!=''){
        // alert(a);
        document.getElementById('demo6').innerHTML="";
    }
   }
   function hidewarn4(a){
    if(a!=''){
        document.getElementById('demo7').innerHTML="";
    }
   }
</script>
    <title>Document</title>
</head>
<body>
<a href="index.php"><-home</a>

<br>
<h1>Submit student</h1><br>
    <form action="substud.php" method="post" onsubmit="return validation()" enctype="multipart/form-data">
    <table border="1">
    <tr>
        <td>college</td>
        <td>
        <div class="clg" id="clg">
        <?php
if($_SESSION['lvl']==0){
$query6=mysqli_query($con,"SELECT * FROM `college` ");
}else{
    $query6=mysqli_query($con,"SELECT * FROM `college` where collegeid='$idd' ");
}
?>
        <select name="clg" id="clgvali" onchange="fun(this.value)">
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
        </div>    
        </td>
    </tr>
    <tr>
        <td>degree</td>
        <td>
            <div id='deg'>  
            <?php  
            if($_SESSION['lvl']==0){
            ?>
        <select name="deg" id="degvali">
        <option value="">select degree</option>
        </select>
            <?php } else{?>
   <!-- here start user      -->
<select name="deg" id="degvali"onchange="fun2(this.value,'<?php echo $clgid;?>')">
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
    </tr>

    <tr>
        <td>course</td>
        <td><div class="crs" id="crs">
        <select name="crs" id="crsvali">
            <option value="">select course</option>
        </select>
        </div></td>
    </tr>
    
    <tr>
        <td>session</td>
        <td>
        <div class="ssn" id="ssn">
        <select name="ssn" id="ssnvali" onchange="return hidewarn(this.value)">
            <option value="">select session</option>
            <?php 
for( $i=2018; $i<=2024; $i++ )
{
    ?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?>
        </select>
        </div>    
        </td>
    </tr>
    <tr>
        <td>fees</td>
        <td><div id="fee" name="fee">
        <input readonly type="text" placeholder="0000.RS" id="feevali" name="fee">
        </div></td>
    </tr>
    <tr>
        <td>name</td>
        <td><input type="text" placeholder="enter your name" name="name" id="name" onkeyup="return hidewarn2(this.value)"></td>
    </tr>
    <tr>
        <td>Date of birth </td>
        <td><input type="date" name="dob" id="dob" onblur="return hidewarn3(this.value)"></td>
    </tr>
    <tr>
    <td>Students image</td>    
    <td>
        <input type="file" name="img" id="img">
    </td>
    </tr>
    <tr>
        <td>number</td>
        <td><input type="number" placeholder="enter your number" name="number" id="number" onkeyup="return hidewarn4(this.value)"></td>
    </tr>
<tr><td><input type="submit" value="submit" name="submit"></td></tr>
    </table>
    </form>
    <b><p id='demo' style="color:red;"></p></b>
    <b><p id='demo2' style="color:red;"></p></b>
    <b><p id='demo3' style="color:red;"></p></b>
    <b><p id='demo4' style="color:red;"></p></b>
    <b><p id='demo5' style="color:red;"></p></b>
    <b><p id='demo6' style="color:red;"></p></b>
    <b><p id='demo7' style="color:red;"></p></b>

<br>

 <!-- data table started -->
<table border="1">
        <tr>
            <td><b>sid</b></td>
            <td><b>degree</b></td>
            <td><b>course</b></td>
            <td><b>college</b></td>
            <td><b>Name</b></td>
            <td><b>Date of birth</b></td>
            <td><b>session</b></td>
            <td><b>photo</b></td>
            <td><b>delete</b></td>

        </tr>
        <tr>
            <?php 
          
            $query=mysqli_query($con,"SELECT * FROM `student` ");
            $total=mysqli_num_rows($query);
            if($total!=0){
                $f=0;
                while($result=mysqli_fetch_assoc($query)){
                    $deg=$result['degree'];
                    $name=$result['name'];
                    $crs=$result['course'];
                    $clg=$result['college'];
                    $ssn=$result['session'];
                    $dob=$result['dateofbirth'];
                    $sid=$result['sid'];
                    $myid=$result['myid'];
                    $f++;
                
            ?>
            <tr>
<td><?php echo $f;?></td>
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
<td><?php echo $name;?></td>
<td><?php echo $dob;?></td>
<td><?php echo $ssn;?></td>
<td><a href="showpic.php?myid=<?php echo $myid;?>" target="#" title="Click to View Full"><img src="student/<?php echo $myid;?>/student_pic.png" style="height:70px;width:70px;" alt=""></a></td>
<td><a href="delstud.php?sid=<?php echo $sid;?>">Delete</a></td>
            <?php }}else{
            ?>
<td>there is no data</td>
            <?php }?>
        </tr>
    </table>
</body>
</html>