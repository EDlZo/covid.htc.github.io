<?php
header('Access-Control-Allow-Origin: *');
$connect = mysqli_connect('localhost', 'root', '', 'covid');

$sql_covid = 'SELECT SUM(infect) AS infect,SUM(recovered) AS recovered,SUM(death) AS death, date FROM covid1 WHERE date="'.date("Y-m-d").'"';
$result_covid = mysqli_query($connect, $sql_covid);
$row_covid = mysqli_fetch_array($result_covid);
$covid_array = array();
$covid_array['date'] = $row_covid['date'];
$covid_array['infect'] = $row_covid['infect'];
$covid_array['death'] = $row_covid['death'];
$covid_array['recovered'] = $row_covid['recovered'];
$sql_covid = 'SELECT SUM(infect) AS total_infect FROM covid1';
$result_covid = mysqli_query($connect, $sql_covid);
$row_covid_2 = mysqli_fetch_array($result_covid);
$covid_array['total_infect'] = $row_covid_2['total_infect'];
echo json_encode($covid_array);