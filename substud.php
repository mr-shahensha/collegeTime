<?php 
include("connection.php");
$ssn=$_REQUEST['ssn'];
$deg=$_REQUEST['deg'];
$crs=$_REQUEST['crs'];
$clg=$_REQUEST['clg'];
$fee=$_REQUEST['fee'];
$name=$_REQUEST['name'];
$dob=$_REQUEST['dob'];
$number=$_REQUEST['number'];

// creaating id
$query0=mysqli_query($con,"SELECT * FROM `student` where session='$ssn' and college='$clg' and degree='$deg' and course='$crs' ");
    $f=1;
    while($result0=mysqli_fetch_assoc($query0)){
        $f++;
    
    }

    $sid=$ssn.$clg.$deg.$crs.str_pad($f, 3, '0', STR_PAD_LEFT);


// adding student to the database
$query0=mysqli_query($con,"INSERT INTO `student` (`sid`,`myid`, `name`, `number`,`dateofbirth`, `degree`, `course`, `college`,`session`, `fee`) VALUES (NULL,'$sid', '$name', '$number','$dob', '$deg', '$crs', '$clg','$ssn', '$fee');");

//image upload
mkdir("student/$sid", 0777, true);

$allowedExts = array("gif", "jpeg", "jpg", "png","PNG");
$temp = explode(".", $_FILES["img"]["name"]);
$extension = end($temp);
if (($_FILES["img"]["size"] <= 327680)&& in_array($extension, $allowedExts))
  {
  if ($_FILES["img"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
    }
  else
    {
     
	  $pic1="student/".$sid."/student_pic.png";
    move_uploaded_file($_FILES["img"]["tmp_name"],$pic1);
    }
  }
else
  {
  echo "Invalid file";
  }

// adding student to signup table 
date_default_timezone_set("asia/kolkata");
$datetime = date('d/m/Y', time());

$password = explode("-", $dob);
$pass=$password[0].$password[1].$password[2];

$query2=mysqli_query($con,"INSERT INTO `signup` (`sid`, `id`, `password`, `date`, `lvl`) VALUES (NULL, '$sid', '$pass', '$datetime', '5');");

//add student to request table

//$query3=mysqli_query($con,"INSERT INTO `request` (`sid`, `stud_id`, `clgid`, `reqid`) VALUES (NULL, '$sid', '$clg', '0');")
?>
<script>
    alert("succesfully inserted");
    document.location="stud.php";
</script>