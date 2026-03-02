<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$connect = mysqli_connect('localhost', 'root', '', 'covid');
if (!$connect) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}
mysqli_set_charset($connect, 'utf8mb4');

$today = date('Y-m-d');
$response = [];

// ยอดวันนี้ (รวมทุกแผนก)
$stmt = mysqli_prepare($connect,
    'SELECT SUM(infect) AS infect, SUM(recovered) AS recovered, SUM(death) AS death, date FROM covid1 WHERE date = ?'
);
mysqli_stmt_bind_param($stmt, 's', $today);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$response['date']      = $row['date'] ?? $today;
$response['infect']    = (int)($row['infect'] ?? 0);
$response['death']     = (int)($row['death'] ?? 0);
$response['recovered'] = (int)($row['recovered'] ?? 0);
mysqli_stmt_close($stmt);

// ยอดผู้ติดเชื้อสะสม
$stmt2 = mysqli_prepare($connect, 'SELECT SUM(infect) AS total_infect FROM covid1');
mysqli_stmt_execute($stmt2);
$result2 = mysqli_stmt_get_result($stmt2);
$row2 = mysqli_fetch_assoc($result2);
$response['total_infect'] = (int)($row2['total_infect'] ?? 0);
mysqli_stmt_close($stmt2);

mysqli_close($connect);
echo json_encode($response);
?>