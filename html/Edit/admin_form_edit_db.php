<?php
include('sql.php');

// Session check
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit;
}

$date      = isset($_POST['date'])      ? trim($_POST['date'])      : '';
$infect    = isset($_POST['infect'])    ? (int)$_POST['infect']    : 0;
$recovered = isset($_POST['recovered']) ? (int)$_POST['recovered'] : 0;
$death     = isset($_POST['death'])     ? (int)$_POST['death']     : 0;
$htc       = isset($_POST['htc'])       ? trim($_POST['htc'])      : '';

if (empty($date) || empty($htc)) {
    header('Location: admin_list.php?msg=error');
    exit;
}

$stmt = mysqli_prepare($con,
    'UPDATE covid1 SET infect = ?, recovered = ?, death = ? WHERE date = ? AND htc = ?'
);
mysqli_stmt_bind_param($stmt, 'iiiss', $infect, $recovered, $death, $date, $htc);
$result = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($con);

if ($result) {
    header('Location: admin_list.php?msg=updated');
} else {
    header('Location: admin_list.php?msg=error');
}
exit;
?>