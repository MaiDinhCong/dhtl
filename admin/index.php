<?php
    include('header.php');
?>

    <div class="container mt-5">
        <div class="row">
         <div class="w-100 text text-center fs-1 mb-2 " >   Quản lý nhân viên </div>
            
            <a class='btn btn-info w-25 m-auto' href="them.php">Thêm</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phòng ban</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../config/constants.php');
                    $sql = "SELECT nv.manv, nv.tennv, nv.chucvu, nv.sodidong, nv.email, dv.tendv from db_nhanvien nv , db_donvi dv 
                        where  nv.madv = dv.madv";
                    $query = mysqli_query($conn, $sql);
                    #echo mysqli_num_rows($query);
                    #mysqli_fetch_assoc()  để lấy ra 1 row
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?> </th>
                            <td><?php echo $row['tennv'] ?></td>
                            <td><?php echo $row['chucvu'] ?></td>
                            <td><?php echo $row['sodidong'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['tendv'] ?></td>
                            <td><a href="sua.php?manv=<?php echo $row['manv'] ?>">Sửa</a></td>
                            <td><a href="xoa.php?manv=<?php echo $row['manv'] ?>">Xóa</a></td>
                        </tr>
                    <?php
                        $count++;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>