<?php
//1. เชื่อมต่อ database:
include('sql.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$date = $_GET["date"];
$htc = $_GET["htc"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM covid1 WHERE date='$date' AND htc='$htc' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($_GET);
?>

<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/65844_18063020204554.png">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <title>Covid Form</title>
    </head>
    <body style="background-color: #353538;">


    <form  name="admin" action="admin_form_edit_db.php" method="POST" id="admin" class="form-horizontal" >
    <input type="hidden" name="date" value="<?php echo $date; ?>">
    <font face="Itim">
        <div class="d-flex vh-100">
            <div style="width: 600px; height: 550px; background-color: #1A1A1A; border-radius: 24px; padding:45px 50px 77px 50px;" class="mx-auto align-self-center">
            <h1 style="color: aliceblue; font-size: 35px; text-align: center ;">บันทึกข้อมูลผู้ป่วยโควิดประจำวัน</h1><br><br>
               <br>
            <div class='col' style="padding: 0px">
                <label style="color: aliceblue; font-size: 25px" >ผู้ติดเชื้อรายใหม่</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type='number' name="infect" type="text"  id="infect" style="width: 312px ; height: 40px;" />
            </div><br>
            <div class='col' style="padding: 0px">
                <label style="color: aliceblue; font-size: 25px">หายแล้ว</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type='number' name='recovered' id='recovered'  style="width: 392px ; height: 40px;"/>
            </div><br>
            <div clas='col' style="padding: 0px">
                <label style="color: aliceblue; font-size: 25px">เสียชีวิต</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type='number' name='death' id='death' style="width: 392px ; height: 40px;" />
            </div><br><br>

            

<input type="hidden" name="htc" value="<?php echo $htc;?>">

            <button type="submit" class="btn btn-success" id="btn" style="width: 500px"> <span class="glyphicon glyphicon-saved" ></span> บันทึกข้อมูล  </button>
            <div style="padding: 10px 0px 0px 395px;"><font style="color: #CFCFCF; font-size: 20px; text-decoration-color: transparent ;">
               
            </div> 
            <div class=block>
                
                <div style="float: right ;"><a style="color: white;" href="http://localhost/html/Edit/admin_list.php">ย้อนกลับ</a></div>
                
                </div>
                
              
                
                
        </div></div></font></font>
  </body>
</html>




        