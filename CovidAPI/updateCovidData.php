<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// ตรวจสอบ Session ก่อน — ปลอดภัยกว่าการใช้ token ใน URL
if (empty($_SESSION['admin_logged_in'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'กรุณาเข้าสู่ระบบก่อน']);
    exit;
}

$connect = mysqli_connect('localhost', 'root', '', 'covid');
if (!$connect) {
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้']);
    exit;
}
mysqli_set_charset($connect, 'utf8mb4');

// รับข้อมูลจาก POST (ปลอดภัยกว่า GET)
$date      = isset($_POST['date'])      ? trim($_POST['date'])      : '';
$infect    = isset($_POST['infect'])    ? (int)$_POST['infect']    : 0;
$recovered = isset($_POST['recovered']) ? (int)$_POST['recovered'] : 0;
$death     = isset($_POST['death'])     ? (int)$_POST['death']     : 0;
$htc       = isset($_POST['htc'])       ? trim($_POST['htc'])      : '';

if (empty($date) || empty($htc)) {
    echo json_encode(['success' => false, 'message' => 'ข้อมูลไม่ครบถ้วน']);
    exit;
}

// ใช้ INSERT ... ON DUPLICATE KEY UPDATE เพื่อไม่ให้มีข้อมูลซ้ำวัน+แผนก
$stmt = mysqli_prepare($connect,
    'INSERT INTO covid1 (date, infect, recovered, death, htc) VALUES (?, ?, ?, ?, ?)
     ON DUPLICATE KEY UPDATE infect=VALUES(infect), recovered=VALUES(recovered), death=VALUES(death)'
);
mysqli_stmt_bind_param($stmt, 'siiis', $date, $infect, $recovered, $death, $htc);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['success' => true, 'message' => 'บันทึกข้อมูลสำเร็จ']);
} else {
    echo json_encode(['success' => false, 'message' => 'บันทึกข้อมูลไม่สำเร็จ: ' . mysqli_error($connect)]);
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>