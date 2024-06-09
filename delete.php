<?php
include_once 'connect-db.php';

// Xử lý khi người dùng xác nhận xóa sinh viên
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sinh viên từ cơ sở dữ liệu
    $stmt = $db->prepare('DELETE FROM students WHERE id=?');
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
