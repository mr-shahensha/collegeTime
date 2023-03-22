<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="css/home.css">
    <!-- link google fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
    </style>
    <!-- navbar button cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>collegeTime</title>
</head>
<body>
    <!-- This is header -->
    <Header>
        <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
        <nav>
        <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label> 
            <ul>
                <li><a href="">Course</a></li>
                <li><a href="">Colleges</a></li>
                <li><a href="">Statistics</a></li>
                <li><a href="">Blogs</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </Header>
    <!-- Main section start here -->
    <Section class="main">
        <div class="main-notes">
        <h1>Best Colleges in india.</h1>
            <h2>Chose your favourite course today.</h2>
            <button>Join today</button>
        </div>
        <img src="assets/main-image.jpg" alt="">
    </Section>
     <!-- news section start -->
     <h1 class="latest-news-tab">Latest update</h1>
     <section class="news">
        <div class="news-post">
            <img src="assets/main-image.jpg" alt="image">
            <h1>This is a header</h1>
            <p>date-time</p>
            <button class="learn-more">learn more</button>
        </div>
        <div class="news-post">
            <img src="assets/main-image.jpg" alt="image">
            <h1>This is a header</h1>
            <p>date-time</p>
            <button class="learn-more">learn more</button>
        </div>
    </section>
    <!-- legecy section start -->
    <h1 class="latest-news-tab">Our Legecy</h1>
    <section class="legecy">
        <div class="legecy-image">
        <img src="assets/main-image.jpg" alt="">
        </div>
            <div class="legecy-comment">
                <h1>Legecy that we are carring for 105 years</h1>
                <p>And we promise we will carry forever.</p>
            </div>
    </section>
    <?php include("footer.php");?>
</body>
</html>