<?php include 'views/layout/main.php'; ?>
<style>
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        margin: 0 5px;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
        border: 1px solid #007bff;
        color: #007bff;
        transition: 0.3s;
    }

    .pagination a:hover {
        background-color: #007bff;
        color: white;
    }

    .pagination a.btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="container mt-4">
    <h1 class="mb-4 text-primary">Danh sách nhân viên</h1>
    
    <a href="index.php?action=create" class="btn btn-success mb-3">
        <i class="fas fa-user-plus"></i> Thêm mới
    </a>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mã NV</th>
                <th>Tên NV</th>
                <th>Giới tính</th>
                <th>Nơi sinh</th>
                <th>Mã phòng</th>
                <th>Lương</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee['Ma_NV'] ?></td>
                    <td><?= $employee['Ten_NV'] ?></td>
                    <td class="text-center">
                        <?php if ($employee['Phai'] == 'NAM'): ?>
                            <img src="public/images/nam.png" width="30px">
                        <?php elseif ($employee['Phai'] == 'NU'): ?>
                            <img src="public/images/nu.png" width="30px">
                        <?php else: ?>
                            Không xác định
                        <?php endif; ?>
                    </td>
                    <td><?= $employee['Noi_Sinh'] ?></td>
                    <td><?= $employee['Ma_Phong'] ?></td>
                    <td><?= number_format($employee['Luong'], 0, ',', '.') ?> đ</td>
                    <td>                         <a href="index.php?action=edit&id=<?= $employee['Ma_NV'] ?>" class="btn btn-sm btn-warning">Sửa</a>                         <a href="index.php?action=delete&id=<?= $employee['Ma_NV'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>                   
                  </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    <?php if (isset($page) && isset($total_pages)): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="index.php?page=<?= $page - 1 ?>" class="btn btn-secondary">« Trước</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="index.php?page=<?= $i ?>" class="btn <?= ($i == $page) ? 'btn-primary' : 'btn-light' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="index.php?page=<?= $page + 1 ?>" class="btn btn-secondary">Sau »</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
