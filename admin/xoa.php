<?php
    include('../config/constants.php');
    #hàm isset để kiểm tra ... có hay không?
    if(isset($_GET['manv']))
    {
        $manv = $_GET['manv'];
        #xóa thằng nhân viên có mã nhân viên trong database bằng với mã nhân viên GET
        $sql = "DELETE FROM `db_nhanvien` WHERE manv='$manv'";
        mysqli_query($conn, $sql);
        header('location: index.php'); #lệnh này dùng để quay về trang mà location được gán
    }
    else
    {
        header('location: index.php');
    }

?>