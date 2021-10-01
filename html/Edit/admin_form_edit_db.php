<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('sql.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $date = $_POST["date"];
  $infect = $_POST["infect"];
  $recovered = $_POST["recovered"];
  $death = $_POST["death"];
  $htc = $_POST["htc"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
        $sql = "UPDATE covid1 SET  
        infect='$infect' , 
        recovered='$recovered' , 
        death='$death' 
        WHERE date='$date' AND htc='$htc' ";   

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'admin_list.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}


?> 