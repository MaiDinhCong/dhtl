<?php
include('header.php')
?>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<div class="container mt-5">
    <form action="adddv.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên đơn vị</label>
            <input type="text" class="form-control" name="Tendonvi">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="Diachi">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" name="Email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số di dộng</label>
            <input type="text" class="form-control" name="Sodidong">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Website</label>
            <input type="text" class="form-control" name="Website">
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