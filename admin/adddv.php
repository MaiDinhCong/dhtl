<?php

    include('../config/constants.php');
    echo'file Add.php';
    $tendv=$_POST['Tendonvi'];
    $diachi=$_POST['Diachi'];
    $email=$_POST['Email'];
    $sodidong=$_POST['Sodidong'];
    $website=$_POST['Website'];
    $madv_cha=$_POST['Phongban'];
    $SQL="INSERT INTO `db_donvi`( `tendv`, `diachi`, `email`, `website`, `dienthoai`, `madv_cha`) VALUES ('$tendv','$diachi','$email','$sodidong','$website',$madv_cha)";
    mysqli_query($conn,$SQL);
    header('location:donvi.php');
    

?>