<?php

    include('../config/constants.php');
    echo'file Add.php';
    $ten=$_POST['Tennhanvien'];
    $cv=$_POST['Chucvu'];
    $mb=$_POST['Mayban'];
    $email=$_POST['Email'];
    $sdd=$_POST['Sodidong'];
    $pb=$_POST['Phongban'];
    $SQL="INSERT INTO `db_nhanvien`( `tennv`, `chucvu`, `mayban`, `email`, `sodidong`, `madv`) VALUES ('$ten','$cv','$mb','$email','$sdd','$pb')";
    mysqli_query($conn,$SQL);
    header('location:index.php');
    

?>