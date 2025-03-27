<?php

require_once 'models/NhanVien.php';

class NhanVienController {
    private $employeeModel;

    public function __construct() {
        $this->employeeModel = new NhanVien();
    }

    public function index() {
        $employees = $this->employeeModel->getAll();
        require_once './views/NhanVien/index.php';
    }

    public function create() {
        require_once './views/NhanVien/add.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $this->employeeModel->create($data);
            header("Location: index.php?action=index");
            exit();
        }
    }

    public function edit($id) {
        $employee = $this->employeeModel->getById($id);
        require_once 'views/NhanVien/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $this->employeeModel->update($id, $data);
            header("Location: index.php?action=index");
            exit();
        }
    }

    public function delete($id) {
        $this->employeeModel->delete($id);
        header("Location: index.php?action=index");
        exit();
    }
}