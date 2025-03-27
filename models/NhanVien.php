<?php

class NhanVien {
    private $db;

    public function __construct() {
        $config = require_once 'config/database.php';
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
            $this->db = new PDO($dsn, $config['username'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM nhanvien"); // Thay nhanvien bằng tên bảng của bạn
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM nhanvien WHERE Ma_NV = ?"); // Thay MaNV bằng cột ID của bạn
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        // Xử lý ảnh (nếu có)
        $gioitinh = $data['Phai']; // Giới tính từ dữ liệu form (Phai)
        $gioitinh_image = ($gioitinh == 'NU') ? 'woman.jpg' : 'man.jpg';

        $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong)
                VALUES (?, ?, ?, ?, ?, ?)"; // Điều chỉnh cột cho phù hợp
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data['Ma_NV'],
            $data['Ten_NV'],
            $gioitinh, 
            $data['Noi_Sinh'],
            $data['Ma_Phong'],
            $data['Luong'],
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data) {
        // Xử lý ảnh khi cập nhật giới tính
        $gioitinh = $data['Phai'];
        $gioitinh_image = ($gioitinh == 'NU') ? 'woman.jpg' : 'man.jpg';

        $sql = "UPDATE nhanvien SET Ten_NV = ?, Phai = ?, Noi_Sinh = ?, Ma_Phong = ?, Luong = ?
                WHERE Ma_NV = ?"; // Điều chỉnh cột cho phù hợp
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data['Ten_NV'],
            $gioitinh_image,
            $data['Noi_Sinh'],
            $data['Ma_Phong'],
            $data['Luong'],
            $id,
        ]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM nhanvien WHERE Ma_NV = ?"); // Thay MaNV bằng cột ID của bạn
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
}