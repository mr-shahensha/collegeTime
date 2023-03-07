    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- javascript link -->
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
    <!-- css link -->
    <link rel="stylesheet" href="css/login.css">
        <title>Login Page</title>
    </head>
    <body>
        <!-- this is header -->
    <Header>
            <div class="logo"><img src="assets/logo.jpg" alt="logo" ></div>
        </header>
        <!-- this is hero section -->
        <section class="hero">
            <div class="img">
            <img src="assets/students.png" alt="image">
            </div>
            <div class="login-form">
            <form action="logic/loginlogic.php" method="post" onsubmit="return validation()">
            <input type="text" placeholder="enter id" name="id" id='id'  onkeyup="return hidewarn(this.value)">

            <input type="text" placeholder="enter password"  name="pass" id='pass' onkeyup="return hidewarn2(this.value)">
              
            <input type="submit" value="submit" name="submit">
            </div>
            <b><p id="vali1" style="color:red;"></p></b>
            <b><p id="vali2" style="color:red;"></p></b>
        </form>
            
    </section>
        <?php include("footer.php");?>
    </body>
    </html>
    <script>
            function validation(){
                var id = document.getElementById('id').value;
                if(id<2){
                    text="Please enter valid ID !!";
                    document.getElementById("vali1").innerHTML=text;
                    return false;
                }
                var pass = document.getElementById('pass').value;
                if(pass<2){
                    text="Please enter valid Password !!";
                    document.getElementById("vali2").innerHTML=text;
                    return false;
                }
            }
            function hidewarn(a){
                if(a!=''){
                    document.getElementById("vali1").innerHTML="";
                }
            }
            function hidewarn2(a){
                if(a!=''){
                    document.getElementById("vali2").innerHTML="";
                }
            }
        </script>