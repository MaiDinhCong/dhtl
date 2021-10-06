<?php
    session_start();
    $madv = $_SESSION['madv'];
    include('../config/constants.php');
    echo $madv;
    if(isset($_GET['submit']))
    {
       
        $tendv= $_GET['Tendonvi'];
        $diachi = $_GET['Diachi'];
        $email = $_GET['Email'];
        $website = $_GET['Website'];
        $sodienthoai = $_GET['Sodienthoai'];
        $sql = "UPDATE db_donvi SET
        tendv = '$tendv',
        diachi = '$diachi',
        email = '$email',
        website = '$website',
        dienthoai = '$sodienthoai' where madv ='$madv'";
        mysqli_query($conn, $sql); 
        header('location: http://localhost/phpForm/admin/donvi.php');
    }
    
?>