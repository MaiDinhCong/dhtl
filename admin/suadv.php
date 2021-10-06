<?php
session_start();
$_SESSION['madv'] = $_GET['madv'];
?>
  <?php
    include('header.php')
    ?>
    <div class="container mt-5">
        <?php
        #bước 1 connect
        include('../config/constants.php');
        #bước 2 lấy mã nhân viên cần sửa
        if (isset($_GET['madv'])) {
            $madv = $_GET['madv'];
            #buowsc 3 select bản ghi có manv trong database bằng với mã nhân viên cần sửa khi click vào sửa
            $sql = "SELECT * from db_donvi where madv = '$madv' ";
            $query = mysqli_query($conn, $sql);
            #echo mysqli_num_rows($query);
            $row = mysqli_fetch_assoc($query);
        }

        ?>
        <form action="luudv.php" method="GET">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên đơn vị</label>
                <input type="text" class="form-control" name="Tendonvi" value="<?php echo $row['tendv']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="Diachi" value="<?php echo $row['diachi']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" class="form-control" name="Email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Số di dộng</label>
                <input type="text" class="form-control" name="Sodidong" value="<?php echo $row['dienthoai']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Website</label>
                <input type="text" class="form-control" name="Website" value="<?php echo $row['website']; ?>">
            </div>
            <label for="exampleFormControlInput1" class="form-label">Phòng ban</label>
            <select class="form-select" aria-label="Default select example" name='Phongban'>
                <?php
                include('../config/constants.php');
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