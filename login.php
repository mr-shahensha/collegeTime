<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
    <title>Document</title>
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
</head>
<body>
    <form action="loginlogic.php" method="post" onsubmit="return validation()">
        <table border='1'>
            <tr>
                <td>
                <input type="text" placeholder="enter id" name="id" id='id'  onkeyup="return hidewarn(this.value)"><br>
                </td>
            </tr>
            <tr>
                <td>
                <input type="text" placeholder="enter password"  name="pass" id='pass' onkeyup="return hidewarn2(this.value)">
                </td>
                <td>
                <input type="submit" value="submit" name="submit">
                </td>
            </tr>
        </table>
        <b><p id="vali1" style="color:red;"></p></b>
        <b><p id="vali2" style="color:red;"></p></b>
    </form>
</body>
</html>