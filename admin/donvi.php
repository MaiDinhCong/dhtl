<?php
 include('header.php');
 ?>

    <div class="container mt-5">
        <div class="row">
            
            <div class="w-100 text text-center fs-1 mb-2"> Quản lý đơn vị </div>
            <a class='btn btn-info w-25 m-auto' href="themdv.php">Thêm đơn vị</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên đơn vị </th>
                        <th scope="col">địa chỉ</th>
                        <th scope="col">Email</th>
                        <th scope="col">website</th>
                        <th scope="col">điện thoại</th>
                        <th scope="col">madv_cha</th>
                        <th scope="col">sửa</th>
                        <th scope="col">xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('../config/constants.php');
                        $sql = "SELECT*FROM db_donvi";
                        $query = mysqli_query($conn, $sql);
                        #echo mysqli_num_rows($query);
                        #mysqli_fetch_assoc()  để lấy ra 1 row
                        $count = 1;
                        while($row = mysqli_fetch_assoc($query))
                        {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $count; ?> </th>
                                <td><?php echo $row['tendv']; ?></td>
                                <td><?php echo $row['diachi']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['website']; ?></td>
                                <td><?php echo $row['dienthoai']; ?></td>
                                <td><?php echo $row['madv_cha']; ?></td>
                                <td><a href="suadv.php?madv=<?php echo $row['madv'];?>" >Sửa</a></td>
                                <td><a href="xoadv.php?madv=<?php echo $row['madv'];?>" >Xóa</a></td>
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