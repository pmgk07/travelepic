<?php
    $dbcon=mysqli_connect("localhost","root","");
    mysqli_select_db($dbcon,"travelepic");
    extract($_POST);
    $group_grouppid=$_POST['id'];
    $group_password=$_POST['password'];

    if($group_password=='')
    {
        echo"<script>alert('Please enter the group password')</script>";
        echo "<script>window.open('../group-login.html','_self')</script>";
        exit();
    }

    $checksql="select groupname from travel_group where groupid='$group_grouppid' and grouppassword='$group_password'"; 
    $result=mysqli_query($dbcon,$checksql);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo"<script>alert('GROUP LOGIN SUCCESSFULL,Loading Group chat page')</script>";
        echo "<script>window.open('../tripindex.html','_self')</script>";
    }
    else
    {
        echo"<script>alert('Login unsuccessfull,please try again')</script>";
        echo "<script>window.open('../group-login.html','_self')</script>";
    }
?>