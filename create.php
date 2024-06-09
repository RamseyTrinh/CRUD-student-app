<?php
include_once 'connect-db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Thêm sinh viên mới vào cơ sở dữ liệu
    $stmt = $db->prepare('INSERT INTO students (fullname, email, phone, address) VALUES (?, ?, ?, ?)');
    $stmt->execute([$fullname, $email, $phone, $address]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh viên mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Thêm Sinh viên mới</h1>
    <form method="post">
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Điện thoại:</label>
        <input type="text" id="phone" name="phone" required>
        
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" required></textarea>
        
        <input type="submit" value="Thêm">
    </form>
</body>
</html>