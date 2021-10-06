<?php

    include('../config/constants.php');
    echo'file Add.php';
    $madv=$_POST['Madonvi'];
    $tendv=$_POST['Tendonvi'];
    $dc=$_POST['Diachi'];
    $email=$_POST['Email'];
    $sdd=$_POST['Sodidong'];
    $website=$_POST['Website'];
    $madvcha=$_POST['Madvcha'];
    $pb=$_POST['Phongban'];
    $SQL="INSERT INTO `db_donvi`(`madv`, `tendv`, `diachi`, `email`, `website`, `dienthoai`, `madv_cha`) VALUES ('$madv','$tendv','$dc','$email','$sdd','$website','$madvcha')";
    mysqli_query($conn,$SQL);
    header('location:index.php');
    

?>