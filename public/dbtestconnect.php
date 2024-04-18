<?php
$sname = "localhost";
$uname="root";
$password="";
$db_name="iCare";
$conn = mysqli_connect($sname,$uname,$password,$db_name);
if(!$conn){
echo "conn failed, loser.";
}

