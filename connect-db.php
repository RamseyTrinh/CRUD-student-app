<?php
// Thông tin kết nối tới cơ sở dữ liệu
$host = 'localhost'; // Địa chỉ host
$dbname = 'student-db'; // Tên cơ sở dữ liệu
$username = 'hoang'; // Tên người dùng MySQL
$password = ''; // Mật khẩu MySQL
try {
    // Tạo kết nối tới cơ sở dữ liệu sử dụng PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
}
?>
