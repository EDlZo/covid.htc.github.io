<?php
header('Access-Control-Allow-Origin: *');
$connect = mysqli_connect('localhost', 'root', '', 'covid');
$sql_login = 'SELECT * FROM user WHERE username="' . $_POST['username'] . '" AND password = "' . $_POST['password'] . '"';
$res_login = mysqli_query($connect, $sql_login);
if ($res_login) {
    if (mysqli_num_rows($res_login) == 1) {
        $token = md5(uniqid(rand(), true));
        $sql_login = 'UPDATE user SET token = "' . $token . '" WHERE username="' . $_POST['username'] . '"';
        $res_login = mysqli_query($connect, $sql_login);
        if ($res_login) {
            echo json_encode(array('token' => $token));
        } else {
            echo json_encode(array('token' => false));
        }

    } else {
        echo json_encode(array('token' => false));
    }
}