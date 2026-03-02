<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$connect = mysqli_connect('localhost', 'root', '', 'covid');
if (!$connect) {
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้']);
    exit;
}
mysqli_set_charset($connect, 'utf8mb4');

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'กรุณากรอกชื่อผู้ใช้และรหัสผ่าน']);
    exit;
}

// Prepared statement — ป้องกัน SQL Injection
$stmt = mysqli_prepare($connect, 'SELECT id, username, password, full_name FROM user WHERE username = ?');
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // ตรวจสอบ password ด้วย bcrypt
    if (password_verify($password, $row['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username']  = $row['username'];
        $_SESSION['admin_name']      = $row['full_name'] ?? $row['username'];
        echo json_encode(['success' => true, 'message' => 'เข้าสู่ระบบสำเร็จ']);
    } else {
        echo json_encode(['success' => false, 'message' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>