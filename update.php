<?php
include_once 'connect-db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Cập nhật thông tin sinh viên vào cơ sở dữ liệu
    $stmt = $db->prepare('UPDATE students SET fullname=?, phone=?, email=?, address=? WHERE id=?');
    $stmt->execute([$fullname, $phone, $email, $address, $id]);

    header('Location: index.php');
    exit;
}
// Lấy thông tin sinh viên cần cập nhật
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $db->prepare('SELECT * FROM students WHERE id=?');
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật Sinh viên</title>
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
    <h1>Cập nhật Sinh viên</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $student['fullname']; ?>" required>
        
        <label for="phone">Điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $student['phone']; ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
        
        <label for="address">Địa chỉ:</label>
        <textarea id="address" name="address" required><?php echo $student['address']; ?></textarea>
        
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>
