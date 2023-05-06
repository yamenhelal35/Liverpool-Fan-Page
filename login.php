<?php

require "dbcon.php";
$mail=$_POST["email"];
$pass= $_POST["password"];
$query="select * from member where mem_mail= '$mail' and mem_pw= '$pass'";
$res=mysqli_query($con, $query);
if(mysqli_num_rows($res)>=1)
{
    echo '<script> alert("you are a validated user. logged in successfully") </script>';
     require "homepage.html";
}
else
{
    echo '<script> alert("Invalid email/password") </script>';
    require "Login.html";
}
mysqli_close($con);

?>