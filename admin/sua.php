<?php
include('header.php')
?>
<div class="container mt-5">
    <?php
    #bước 1 connect
    include('../config/constants.php');
    #bước 2 lấy mã nhân viên cần sửa
    if (isset($_GET['manv'])) {
        $manv = $_GET['manv'];
        #buowsc 3 select bản ghi có manv trong database bằng với mã nhân viên cần sửa khi click vào sửa
        $sql = "SELECT * from db_nhanvien where manv = '$manv' ";
        $query = mysqli_query($conn, $sql);
        #echo mysqli_num_rows($query);
        $row = mysqli_fetch_assoc($query);
    }

    ?>
    <form action="luu.php">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên</label>
            <input type="text" class="form-control" value="<?php echo $row['tennv']; ?>" name="ten">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" value="<?php echo $row['chucvu']; ?>" name="cv">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" value="<?php echo $row['sodidong']; ?>" name="sdt">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email">
        </div>
        <label for="exampleFormControlInput1" class="form-label">Phòng ban</label>
        <select class="form-select" aria-label="Default select example" name='pb'>
            <?php
            #lấy danh sách phòng ban cho vào option 
            $sql = "SELECT madv, tendv from db_donvi";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <option value="<?php echo $row['madv']; ?>"><?php echo $row['tendv']; ?></option>
            <?php
            }
            ?>
        </select>
        <a href="#"><button class="btn btn-info" type="submit" name='submit'>Lưu</button></a>
    </form>
</div>

</body>

</html>