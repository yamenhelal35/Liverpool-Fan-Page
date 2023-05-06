<?php

require "dbcon.php";

$m_name= $_POST["name"];
$m_mail= $_POST["email"];
$m_birth= $_POST["birth"];
$m_pass= $_POST["pw"];
$m_repass= $_POST["re-pw"];

if($m_name =="" || $m_mail== "" || $m_birth== "" || $m_pass=="" || $m_repass=="" ){
    echo '<script> alert("empty field(s)") </script>';
    require "Join.html";
}
else if($m_pass!=$m_repass)
{
    echo '<script> alert("password doesnt match") </script>';
    require "Join.html";
}
else if(!filter_var($m_mail, FILTER_VALIDATE_EMAIL))
{
    echo '<script> alert("Invaild email") </script>';
    require "Join.html";
}
else{
   
    $sql="select * from member where mem_name= '$m_name'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($res)>=1)
    {
        echo '<script> alert("name already taken") </script>';
        require "Join.html";
    }
    else
    {
        mysqli_query($con,"insert into member (mem_name,mem_mail,mem_pw,mem_date) values ('$m_name', '$m_mail', '$m_pass','$m_birth')");
        echo '<script> alert("registeri success") </script>';
        require "Login.html";
    }
}
mysqli_close($con);
?>