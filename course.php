<?php
include("logic/connection.php");
include("logic/back.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<a href="index.php"><-home</a>

    <h1>course page</h1>
    <form action="subcrs.php" method="post" onsubmit="return validation()">
    <table  border="2">
        <tr>
            <td>course :</td>
            <td><input type="text" placeholder="enter your text" name="crsnm" id="crsnm" onkeyup="return hide(this.value)"></td>
            <td><input type="submit" value="submit" name="submit"></td>
        </tr>
    </table>
    <b><p id='demo' style="color:red;"></p></b>

    </form>

   
    <br>
    <div>
        <table  border="2">
            <tr>
                <td>sid</td>
                <td>course</td>
                <td>action</td>
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
                <td><a href="delcrs.php?sid=<?php echo $sid;?>">delete</a></td>
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