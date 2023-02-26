<?php 
$server="localhost";
$username="root";
$password="";
$databasae="hometask";
if(!$con=mysqli_connect($server,$username,$password,$databasae)){
    echo "failed to connedct";
}


?>