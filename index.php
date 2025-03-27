<?php

require_once 'controllers/NhanVienController.php';
//require_once 'controllers/PhongBanController.php';

$NhanViencontroller = new NhanVienController();
//$phongBanController = new PhongBanController();

$action     = $_GET['action'] ?? 'index';
$id         = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $NhanViencontroller->index();
        break;
    case 'create':
        $NhanViencontroller->create();
        break;
    case 'store':
        $NhanViencontroller->store();
        break;
    case 'edit':
        $NhanViencontroller->edit($id);
        break;
    case 'update':
        $NhanViencontroller->update($id);
        break;
    case 'delete':
        $NhanViencontroller->delete($id);
        break;
    default:
        $NhanViencontroller->index();


}