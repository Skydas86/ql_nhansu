<?php include 'views/layout/main.php'; ?>
<div class="container">
    <h1>Thêm nhân viên</h1>
    <form action="index.php?action=store" method="post">
        <div class="form-group">
            <label>Mã NV</label>
            <input type="text" name="Ma_NV" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tên NV</label>
            <input type="text" name="Ten_NV" class="form-control" required>
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
            <input type="text" name="Noi_Sinh" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mã phòng</label>
            <input type="text" name="Ma_Phong" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Lương</label>
            <input type="number" name="Luong" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="index.php?action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>