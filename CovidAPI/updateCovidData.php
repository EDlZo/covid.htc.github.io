<?php
header('Access-Control-Allow-Origin: *');
$connect = mysqli_connect('localhost', 'root', '', 'covid');

$sql_checkToken = 'SELECT * FROM user WHERE token="' . $_GET['token'] . '"';
$res_checkToken = mysqli_query($connect, $sql_checkToken);
if ($res_checkToken) {
    if (mysqli_num_rows($res_checkToken) == 1) {
        $sql_insertCovid = 'INSERT INTO covid1 (`date`, `infect`, `recovered`, `death`,`htc`) VALUES ("' . $_GET['date'] . '", "' . $_GET['infect'] . '", "' . $_GET['recovered'] . '", "' . $_GET['death'] . '","' . $_GET['htc'].'")';
        $res_insertCovid = mysqli_query($connect, $sql_insertCovid);
        if ($res_insertCovid) {
            echo 'success';
        } else {
            echo 'failed';
        }
    } else {
        echo 'failed';
    }
} else {
    echo 'failed';
}