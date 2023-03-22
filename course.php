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
    <title>Course</title>
</head>
<body>
    <!-- this is header -->
    <Header>
        <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
    </header>
 <!-- this is hello section -->
<section class="hello">
<h1>Course page</h1>
</section>

<!-- this is hero section -->
<section class="degree-hero">
    <!-- hero section part one -->
    <div class="part-one">
    <form action="subcrs.php" method="post" onsubmit="return validation()">
    <table>
        <tr>
            <td>course :</td>
            <td><input type="text" placeholder="enter your text" name="crsnm" id="crsnm" onkeyup="return hide(this.value)"></td>
            <td><input type="submit" value="submit" name="submit"></td>
        </tr>
    </table>
    <b><p id='demo' style="color:red;"></p></b>
    </form>
    <!-- hero section part two -->
    <div class="part-two">
        <table>
            <tr>
                <td>sid</td>
                <td>course</td>
                <td>delete</td>
            </tr>
            <tr>
                <?php 
                $query=mysqli_query($con,"SELECT * FROM `course`");
                $total=mysqli_num_rows($query);
                    if($total!=0){
                        $f=0;
            while($result=mysqli_fetch_assoc($query)){
                $sid=$result['sid'];
                $crsnm=$result['coursename'];
                $f++;
                ?>
                <td><?php echo $f; ?></td>
                <td><?php echo $crsnm; ?></td>
                <td><a href="delete/delcrs.php?sid=<?php echo $sid;?>"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
            <?php
}
        }else{
            ?>
      <td> there is no data</td>
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

<script>
            function validation() {
    var crsnm = document.getElementById('crsnm').value;
    if(crsnm.length <2 ) {
        text = "Please enter your text";
                document.getElementById("demo").innerHTML = text;
                return false;
            }
        }
        function hide(a){
            if(a!=''){
                document.getElementById('demo').innerHTML="";
            }
        }
</script>