<?php
include('sql.php');

// Session check
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit;
}

$date = isset($_GET['date']) ? trim($_GET['date']) : '';
$htc  = isset($_GET['htc'])  ? trim($_GET['htc'])  : '';

if (empty($date) || empty($htc)) {
    header('Location: admin_list.php');
    exit;
}

$stmt = mysqli_prepare($con, 'DELETE FROM covid1 WHERE date = ? AND htc = ?');
mysqli_stmt_bind_param($stmt, 'ss', $date, $htc);
$result = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($con);

if ($result) {
    header('Location: admin_list.php?msg=deleted');
} else {
    header('Location: admin_list.php?msg=error');
}
exit;
?>