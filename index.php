<?php 
 include("logic/connection.php");
 include("logic/back.php");
$idd=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <!-- this is header -->
    <Header>
            <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
    </header>
    <!-- hello section -->
    <section class="hello">
    <?php 
        if($_SESSION['lvl']==0){
            ?>
            <h1>Hello Admin</h1>
            <?php
        }elseif($_SESSION['lvl']==5)  { 
            $query3=mysqli_query($con,"SELECT * FROM `student` where myid='$idd'");
              while($result3=mysqli_fetch_assoc($query3)){
                 $nm=$result3['name'];
             }
             ?>
               <h1>Hello <?php echo $nm;?></h1>
              <?php
              }elseif($_SESSION['lvl']==10){
                $query4=mysqli_query($con,"SELECT * FROM `college` where collegeid='$idd'");
               while($result4=mysqli_fetch_assoc($query4)){
                  $clgnm=$result4['collegename'];
              }
              ?> <h1>Hello <?php echo $clgnm;?></h1>
              <?php }?>
    </section>
    <!-- hero section started -->
    <section class="hero">
        <div class="left-hero-section">
            <ul class="nav-section">
            <!-- nav section for admin -->
            <?php if($_SESSION['lvl']==0){?>
                <li><a href="degree.php">degree</a></li>
                <li><a href="course.php">course</a></li>
                <li><a href="college.php">college</a></li>
                 <!-- nav section for college and admin -->
                <?php }if($_SESSION['lvl']==10 || $_SESSION['lvl']==0){?>
                <li><a href="degcourse.php">degree wise course</a></li>
                <li><a href="degclg.php">degree wise college</a></li>
                <li><a href="stud.php">submit student</a></li>
                 <!-- nav section for college and student -->
                <?php }if($_SESSION['lvl']==10 || $_SESSION['lvl']==5){?>
                <li><a href="notification.php">Notification</a></li>
                <?php }?>
                <li><a href="logic/logout.php">logout</a></li>
            </ul>
        </div>
        <div class="right-hero-section">
        <?php if($_SESSION['lvl']==10 || $_SESSION['lvl']==0){?>
                    <ul>
                        <li> <a href="download.php">download data</a></li>
                        <li><a href="search.php">search</a></li>
                    </ul>
                    <?php }
                    include("profile.php");
                    ?>
                    
        </div>
    </section>
    <?php include("footer.php");?>
</body>
</html>