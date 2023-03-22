<?php 
 include("logic/connection.php");
 include("logic/back.php");
$idd=$_SESSION['id'];
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
    <title>Change Password</title>
</head>
<body>
      <!-- this is header -->
      <Header>
        <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
    </header>
 <!-- this is hello section -->
<section class="hello">
<h1>Change password</h1>
</section>
<!-- this is hero section -->
<section class="degree-hero">
    <!-- hero section part one -->
    <div class="part-one">
<form action="logic/passlogic.php" method="post" onsubmit='return validation()'>
        <table>
            <tr>
                <td>Enter old password</td>
                <td><input type="password" autocomplete='off' placeholder="enter old password" name='oldpass' id='oldpass' onkeyup='return hidewarn(this.value)'></td>
            </tr>
            <tr>
                <td>Enter new password</td>
                <td><input type="password" autocomplete='off' placeholder="enter new password" name='newpass' id='newpass' onkeyup='return hidewarn1(this.value)'></td>
            </tr> <tr>
                <td>Confirm new password</td>
                <td><input style="width:350px;" type="text" autocomplete='off' placeholder="confirm newpassword" name='conpass' id='conpass' onkeyup='return hidewarn2(this.value)'></td>
            </tr>
            <tr><td><input type="submit" value="submit" name='submit'></td></tr>
        </table>
        <b><p id='warn' style='color:red;'></p></b>
        <b><p id='warn1' style='color:red;'></p></b>
        <b><p id='warn2' style='color:red;'></p></b>
        <b><p id='warn3' style='color:red;'></p></b>
    </form>
    </div>
    </section>
    <!-- this is footer section -->
    <?php include("footer.php");?>
</body>
</html>
<script>
        function validation(){
        var oldpass=document.getElementById('oldpass').value;
        if(oldpass.length==''){
            text="enter old password";
            document.getElementById('warn').innerHTML=text;
            return false;
        }
        var newpass=document.getElementById('newpass').value;
        if(newpass.length==''){
            text1="enter new password";
            document.getElementById('warn1').innerHTML=text1;
            return false;
        }else if(newpass.length<=4){
            text3="New password must be 5 digit ";
            document.getElementById('warn3').innerHTML=text3;
            return false;
        }
        var conpass=document.getElementById('conpass').value;
        if(conpass.length==''){
            text2="enter confirm password";
            document.getElementById('warn2').innerHTML=text2;
            return false;
        }
        }
        function hidewarn(a){
            if(a!=''){
                document.getElementById('warn').innerHTML="";
            }
        }
        function hidewarn1(a){
            if(a!=''){
                document.getElementById('warn1').innerHTML="";
            }
            if(a.length>=5){
                document.getElementById('warn3').innerHTML="";
            }
        }
        function hidewarn2(a){
            if(a!=''){
                document.getElementById('warn2').innerHTML="";
            }
        }
    </script>