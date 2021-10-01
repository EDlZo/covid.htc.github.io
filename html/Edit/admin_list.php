<?php

$con = mysqli_connect("localhost","root","","covid");
$query = "SELECT * FROM covid1  ORDER BY date desc";
$result = mysqli_query($con,$query)
?>



<html>
  <head>
  <title>Covid Dashboard</title>


    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/65844_18063020204554.png">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">\
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
</head>
<style>
body {
  background-color: #353538;
}
</style>
<div style="width:1500px; background-color: #1A1A1A; border-radius: 24px; padding:45px 50px 77px 50px; margin-top: 100px;" class="mx-auto align-self-center">
<div style="float:left">
      
        
          <a href="http://localhost/html/">
          <i class="fa fa-home" aria-hidden="true"  style='font-size:50px; color:#fff'></i>

          </a>
        </li>
</div>
<div style="height: 100px; text-align : center;" ><font size="12" face="Itim" color="#fff" >บันทึกข้อมูลผู้ป่วยโควิดประจำวัน</div></font>
<center>
<div class="container" ><a href="../From.html"><button type="submit" class="btn btn-success" id="btn"> <span></span>
<font face="Itim" size="5px"> บันทึกข้อมูลผู้ป่วยโควิดประจำวัน  </font></button></div></a><br>
<div class="container" style="width: 1500px; text-align:center;" >
<font   face="Itim" color="#fff" >



<div class="container">

<br/>
<br/>
<div class="col-md-2">
    <input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2">
    <input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-8">
    <input type="button" name="range" id="range" value="Range" class="btn btn-success"/>
</div>
<div class="clearfix"></div>
<br/>
<script>
            
$(document).ready(function){
  $datapicker.setDefaults({
      dataFormat:'yy-mm-dd'
});
$(function(){
  $("#From").datepicker();
  $("#to").datepicker();
});
}

        </script>

<br><br><br>

<?php

 //1. เชื่อมต่อ database:
 include('sql.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 //2. query ข้อมูลจากตาราง tb_admin:
 $query = "SELECT * FROM covid1 ORDER BY date DESC" or die("Error:" . mysqli_error());
 //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
 $result = mysqli_query($con, $query);
 //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
 echo ' <table class="table" style="text-align:center; color: #fff; font-size : 20px;" >';
   //หัวข้อตาราง 
     echo "
       <tr>
       <td>วันที่</td>
       <td>ติดเชื้อเพิ่มวันนี้</td>
       <td>หายแล้ววันนี้</td>
       <td>เสียชีวิต</td>
       <td>แผนก</td>
       <td>แก้ไข</td>
       <td>ลบ</td>
     </tr>";
 
   while($row = mysqli_fetch_array($result)) {
   echo "<tr>";
     echo "<td>" .$row["date"] .  "</td> ";
     echo "<td>" .$row["infect"] .  "</td> ";
     echo "<td>" .$row["recovered"] .  "</td> ";
     echo "<td>" .$row["death"] .  "</td> ";
     echo "<td>" .$row["htc"] .  "</td> ";
     //แก้ไขข้อมูล
     echo "<td><a href='admin_from_edit.php?act=edit&date=$row[0]&htc=$row[4]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
     
     //ลบข้อมูล
     echo "<td><a href='admin_from_del_db.php?date=$row[0]&htc=$row[4]' onclick=\"return confirm
     ('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
   echo "</tr>";
   }
 echo "</table>";
 //5. close connection
 mysqli_close($con);
 ?>
 </div></div></div></font>
 <script>
            

            $(document).ready(function(){
                if(getCookie('token')==''){
                    window.location.href='./login.html'
                }
            });

            $(document).ready(function(){
              $(function(){
                $("#date").datapicker();
                $("#date").datapicker();

              });
            });

        </script>

        