<?php
    include('../config/constants.php');
    #hàm isset để kiểm tra ... có hay không?
    if(isset($_GET['madv']))
    {
        $madv = $_GET['madv'];
        #xóa thằng nhân viên có mã nhân viên trong database bằng với mã nhân viên GET
        $sql = "DELETE FROM `db_donvi` WHERE madv='$madv'";
        mysqli_query($conn, $sql);
        header('location: donvi.php'); #lệnh này dùng để quay về trang mà location được gán
    }
    else
    {
        header('location: donvi.php');
    }

?>