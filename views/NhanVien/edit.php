<?php include 'views/layout/main.php'; ?>
<div class="container">
    <h1>Sửa nhân viên</h1>
    <form action="index.php?action=update&id=<?= $employee['Ma_NV'] ?>" method="post">
        <div class="form-group">
            <label>Mã NV</label>
            <input type="text" name="Ma_NV" class="form-control" value="<?= $employee['Ma_NV'] ?>" readonly>
        </div>
        <div class="form-group">
            <label>Tên NV</label>
            <input type="text" name="Ten_NV" class="form-control" value="<?= $employee['Ten_NV'] ?>" required>
        </div>
        <div class="form-group">
            <label>Giới tính:</label><br>
            <input type="radio" id="nu" name="Phai" value="NU">
            <label for="nu">Nữ</label>
            <input type="radio" id="nam" name="Phai" value="NAM">
            <label for="nam">Nam</label>
        </div>

        <div class="form-group">
            <label>Nơi sinh</label>
            <input type="text" name="Noi_Sinh" class="form-control" value="<?= $employee['Noi_Sinh'] ?>" required>
        </div>
        <div class="form-group">
            <label>Mã phòng</label>
            <input type="text" name="Ma_Phong" class="form-control" value="<?= $employee['Ma_Phong'] ?>" required>
        </div>
        <div class="form-group">
            <label>Lương</label>
            <input type="number" name="Luong" class="form-control" value="<?= $employee['Luong'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php?action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>