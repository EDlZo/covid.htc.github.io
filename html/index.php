<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">
  
  <title>Covid HTC Projects</title>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="shortcut icon" href="../assets/img/65844_18063020204554.png" />
  
  <link rel="stylesheet" type="text/css" href="../assets/css/themify-icons.css">
  
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
  
  <link rel="stylesheet" type="text/css" href="../assets/vendor/owl-carousel/owl.carousel.css">
  
  <link rel="stylesheet" type="text/css" href="../assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css">
  
  <link rel="stylesheet" type="text/css" href="../assets/vendor/nice-select/css/nice-select.css">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/fancybox/css/jquery.fancybox.min.css">
  
  <link rel="stylesheet" type="text/css" href="../assets/css/virtual.css">
  
  <link rel="stylesheet" type="text/css" href="../assets/css/minibar.virtual.css">

  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

	<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column-1 {
  float: left;
  width: 16%;
  padding: 28px;
  height: 200px; 
	text-align: center
  
  ;
}
.column-2 {
  float: left;
  width: 84%;
  padding: 43px;
  height: 200px;
	text-align: left/* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</head>
<body class="theme-green">
  
  <!-- Back to top button -->
  <div class="btn-back_to_top">
    <span class="ti-arrow-up"></span>
  </div>
  
  <!-- Setting button -->
  <div class="config">
    <div class="template-config">
      <!-- Settings -->
    
      </div>
      <!-- Puschase -->
      <div class="d-block">
        <a href="https://macodeid.com/projects/virtual-folio/" class="btn btn-fab btn-sm" title="Get this template" data-toggle="tooltip" data-placement="left"><span class="ti-download"></span></a>
      </div>
      <!-- Help -->
      <div class="d-block">
        <a href="#" class="btn btn-fab btn-sm" title="Help" data-toggle="tooltip" data-placement="left"><span class="ti-help"></span></a>
      </div>
     
  </div>
  
  <div class="topbar-nav fixed-top">
    <div class="brand">
      
    </div>
    <h3 class="ml-1">Gram</h3>
    <button class="btn-fab toggle-menu mr-3"><span class="ti-menu"></span></button>
  </div>
  
  <!-- Minibar -->
  <div class="minibar">
    <div class="header">
      <div class="brand">
        
      </div>
    </div>
    <div class="content">
      <ul class="main-menu">
        <li class="menu-item active">
          <a href="#home" class="menu-link">
            <span class="icon ti-home"></span>
            <span class="caption"></span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#about" class="menu-link">
            <span class="icon ti-pulse"></span>
            <span class="caption"></span></a>
        </li>
        
        <li class="menu-item">
          <a href="#portfolio" class="menu-link">
            <span class="icon ti-layout-column2"></span>
            <span class="caption"></span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#blog" class="menu-link">
            <span class="icon ti-book"></span>
            <span class="caption"></span>
          </a>
        </li>
        
		  
      </ul>
		<div style="height: 520px"></div>
    </div>
	  <div  >
      <ul class="main-menu">
        
        <li class="menu-item">
          <a href="./login.html" class="menu-link">
            <span class="icon ti-user"></span>
            <span class="caption"></span></a>
        </li>
        
        
		  
      </ul>
		
    </div>
  </div>
  
  <div class="vg-main-wrapper">
    <div class="vg-page page-home" id="home" style="background-image: url(../assets/img/โควิด-19-1-1-728x485.png);">
      <div class="caption wow zoomInUp">
        <h1 class="fw-normal">Welcome</h1>
        <h2 class="fw-medium fg-theme">Status-Covid-HTC</h2>
        <p class="tagline" >ยอดผู้ป่วยโควิด19ประจำวันนี้</p>
      </div>
    </div>
    
    <!-- Page About -->
    <div class="vg-page page-about" id="about">
      <!-- Profile -->
      
      <script>
        
        $( document ).ready(function() {
          $.get('http://localhost/CovidAPI/', {}, function(res) {
          var resp = JSON.parse(res);
          document.getElementById('new_infect').textContent = resp.infect;
          document.getElementById('total_infect').textContent = resp.total_infect;
          document.getElementById('recovered').textContent = resp.recovered;
          document.getElementById('death').textContent = resp.death;
        })
});
        </script><div style=" height: 10px"></div>
      <div style=><div style="height: 120px"></div>
		  <div class="container" style="justify-content: center ;">
        <div class='text-right'><font face="Itim" size="6">
        สถานการณ์ COVID-19 <br/>
        ในวิทยาลัยเทคนิคหาดใหญ่ <br/>
        <div id='current-date'>วันที่ </div><script>var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();
          
          today = dd + '/' + mm + '/' + yyyy;document.getElementById('current-date').innerHTML = 'วันที่ ' + today</script>
          </div></font>
          <div class='row'>
            <div class='col-3'>
            <div class='card'>
              <div class='card-body' style="background: #1A1A1A; text-align: center">
                <font size="6" color="#FFFFFF" face="Itim" style="">ผู้ติดเชื้อรายใหม่</font>
               <font face="Itim" size="10" > <div class='card-title' style="background: #E8E8E8 ;height: 100px; border-radius: : 6px; text-align: center" id='new_infect'>
                </div>
              </div>
            </div>
          </div></font>
          <div class='col'>
            <div class='card'>
              <div class='card-body' style="background: #ffc700; text-align: center">
                <font size="6" color="#FFFFFF" face="Itim">ผู้ติดเชื้อสะสม</font>
                <font face="Itim" size="10" ><div class='card-title' style="background: #E8E8E8 ;height: 100px; border-radius: : 6px;" id='total_infect'>
</div>
                </div>
              </div>
            </div></font>
          </div><br>
		  <div class='row'>
          <div class='col'>
            <div class='card'>
              <div class='card-body' style="background:#039245; text-align: center">
                <font size="6" color="#FFFFFF" face="Itim">หายป่วยแล้ว</font>
                <font face="Itim" size="10" ><div class='card-title' style="background: #E8E8E8 ;height: 100px; border-radius: : 6px;" id='recovered'>

                </div>
              </div>
            </div>
          </div></font>
          <div class='col'>
            <div class='card'>
              <div class='card-body' style="background:#D22D36; text-align: center">
                <font size="6" color="#FFFFFF" face="Itim">เสียชีวิต</font>
               <font face="Itim" size="10" > <div class='card-title'  style="background: #E8E8E8 ;height: 100px; border-radius: : 6px;" id='death'>
				   </div>
				   
				   
              </div>
            </div>
          </div></font>
          </div>
      </div> <!-- End profile -->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div style='background-color:#353538; height: 30px;'></div>
<div  style='background-color:#353538; height:100px; padding: 20px'><h2><font face="Itim" size="6px" color="#fff">จำนวนโควิด-19 แต่ละแผนก ของวันนี้</h2></div>
<font face="Itim" size="5px"  >
  <div style="background-color:#272729; height:1px;"></div>
<?php
$connect = mysqli_connect("localhost", "root", "", "covid");
$sql="SELECT * FROM covid1 WHERE date='".date("Y-m-d")."'";
$result = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($result)){
  

  echo "<div style='background-color:#353538;'>"; 
  echo "<div class='container' style='padding: 10px ;' > ";
  echo "<br>";
  echo "<font size='6px' >";
  echo $row['htc'];
  echo "</div> ";
  echo "<div class='container' float='left'> ";
  
  echo "</div>"; 
  echo "</font>";
  echo "<font color='#CCCCCC' height='5px';>";
  echo "<div class='container' float='left'> ";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "• ผู้ติดเชื้อรายใหม่";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";

  echo $row['infect'];
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "ราย"; 
  echo "</div>"; 

  echo "<div class='container' float='left'> ";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "• หายแล้ววันนี้";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo $row['recovered']; 
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "ราย"; 

  echo "</div>"; 

  echo "<div class='container' float='left'> ";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "• เสียชีวิตวันนี้";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";

  echo $row['death'];
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "ราย"; 
  
  echo "<div style='background-color:#272729; height:1px;'>";
  

  echo "</div>";
  echo "</div>"; 
  echo "<br>";
  echo "</div>"; 
  echo "</font>"; 

}
?>



<?php 

//index.php

$query = 'SELECT SUM(infect) AS infect,SUM(recovered) AS recovered,SUM(death) AS death, date FROM covid1 GROUP BY date ORDER BY date ASC';
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{

 $chart_data .= "{ infect:'".$row["infect"]."', recovered:".$row["recovered"].", death:".$row["death"].", date:'".$row["date"]."'}, " ;
}

$chart_data = substr($chart_data, 0, -2);

?>


<!DOCTYPE html>
<html>
 <head>
  
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body >
  
<div style="background:#272729; height:30px"></div>
<font face="Itim" size="6px" >
<div style="background:#272729; height:100; padding:20px;">
กราฟแสดงจำนวนย้อนหลัง
</div></font>
<div style="background-color:#000000; ;height:1px"></div>
  <div style="background:#272729;">
  <div class="container" style="width: 2000px;px; background:#272729; height:10">
    
   
   <div id="chart" style=" height: 450px;   padding: 120px 30px 30px 30px;"></div>
  </div>
</div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['infect', 'recovered', 'death'],
 labels:['ติดเชื้อวันนี้', 'หายแล้ววันนี้', 'เสียชีวิต'],
 hideHover:'auto',
 stacked:true,
 xLabelAngle : 90,
 barColors : ['#1A1A1A','#039245','#FF3737']


});
</script>
</div>

      
      <script>
      var slideIndex = 1;
      showDivs(slideIndex);
      
      function plusDivs(n) {
        showDivs(slideIndex += n);
      }
      
      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = x.length} ;
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        x[slideIndex-1].style.display = "block";  
      }
      </script>
      <div style="height: 200px; background:#272729;"></div>
    <!-- Testimonials -->
    
    
    <!-- Portfolio page -->
		  <div style="background: #353538 ; height: 30px"></div>
	<div style="background: #353538 ; height: 100px ; padding: 20px"><font face="Itim" size="6" color="#FFFFFF"><i class="large bookmark_border"></i>ศูนย์รวมความรู้เกี่ยวกับ COVID-19</div>	
    <div class="vg-page page-portfolio" id="portfolio" style="padding: 0 !important"></div>
      <div >
        <div class="text-center wow fadeInUp">
        <div style="height: 1px; background:#272729;" ></div>
			<div>
       <div class="row">
		   
    <div class="column-1" style="background-color:#38383B;">
      <a href="New1.html"><img src="../assets/img/sinovac.PNG" style="height: 150px; margin: 50 50;  display: block;align-content: center" ></a>

     
    </div>
    <div class="column-2" style="background-color:#353538;">
     <font face="Itim" color="c#FFFFFF"  ><a href="New1.html" style="text-decoration: none ; color:#FFFFFF"> <h2>สังเกตลักษณะอาการใหม่ป่วยโควิด-19 ตาแดง มีผื่นขึ้น</h2></a><font color=#A3A3A3 size="3">การระบาดระลอกใหม่ของโควิด-19 ในไทย จากสถานบันเทิง พบว่า ส่วนใหญ่เป็นคนวัยหนุ่มสาวที่แสดงอาการน้อยมาก โดย นพ.โอภาส การย์กวินพงศ์ อธิบดีกรมควบคุมโรค กระทรวงสาธารณสุข ออกมาเปิดก่อนหน้านี้ว่า จากการสังเกต<br>อาการทางคลินิกของผู้ป่วยโควิด-19 มีอาการใหม่เพิ่มเติม คือ ตาแดง น้ำมูกไหล ไม่มีไข้ บางรายมีผื่น ต่างจากอาการเดิม คือ มีไข้ ไอ เจ็บคอ จมูกไม่ได้กลิ่น ลิ้นไม่รับรส ซึ่งทำให้หลายคนเริ่มเกิดความกังวลเนื่องจากเป็นอาการที่ใกล้เคียง...</font>
      
    </div>
  </div></a>
		<div style="height: 1px; background:#272729" ></div>
				
       <div class="row">
		   
    <div class="column-1" style="background-color:#38383B;">
      <a href="New2.html"><img src="../assets/img/New2.png" style="height: 150px; margin: 50 50;  display: block;align-content: center" >

     
    </div>
    <div class="column-2" style="background-color:#353538;">
     <font face="Itim" color="#fff"  > <a href="New2.html" style="text-decoration: none ; color:#FFFFFF"><h2>โควิด-19 ทำเด็กติดมือถือ เสี่ยงกระทบพัฒนาการ</h2></a><font color=#A3A3A3 size="3" style="line-height: 1 pt">การเลี้ยงดูปลูกฝังให้เด็กคนหนึ่งเติบโตมาอย่างสมบูรณ์แข็งแรง ทั้งสุขภาพกายและสุขภาพจิต เป็นความฝันสูงสุดของพ่อแม่ แต่ด้วยปัจจัยที่ไม่สามารถควบคุมได้บางอย่าง เช่น สถานการณ์โรคระบาด อาจบีบบังคับให้เด็กเล็กต้อง<br>เผชิญกับผลกระทบด้านพัฒนาการ เพราะต้องกักตัวอยู่แต่บ้าน ไม่สามารถทำกิจกรรมที่ส่งเสริมให้เกิดกระบวนการเติบโตที่เหมาะสมตามวัย เมื่อประกอบเข้ากับความจำเป็นของผู้ปกครองที่ต้องออกจากบ้านไปทำงาน เพื่อหารายได้มาจุนเจือ...</font>
      
    </div>
  </div></a>
      </div>
			
			<div style="height: 1px; background:#272729" ></div>
				
       <div class="row">
		   
    <div class="column-1" style="background-color:#38383B;">
      <a href="New3.html"><img src="../assets/img/New3.PNG" style="height: 150px; margin: 50 50;  display: block;align-content: center" >

     
    </div>
    <div class="column-2" style="background-color:#353538;">
     <font face="Itim" color="#fff"  > <a href="New3.html" style="text-decoration: none ; color:#FFFFFF"><h2>นักจิตวิทยา ห่วงคนไทยเครียดจากผลกระทบโควิด-19 พร้อมแนะวิธีจัดการอารมณ์</h2></a><font color=#A3A3A3 size="3" style="line-height: 1 pt">จากวิกฤตโควิด-19 ระบาด ประชาชนไม่เพียงแค่กังวลเรื่องสุขภาพว่าเราจะได้รับเชื้อหรือไม่ แต่ยังมีปัญหาเรื่องผลกระทบทางเศรษฐกิจตามมามากมาย บางคนถึงกับเครียด ส่งผลกระทบต่อสภาพจิตใจ Workpoint Today พูดคุยกับ <br>ดร.เจนนิเฟอร์ ชวโนวานิช อาจารย์สาขาจิตวิทยาอุตสาหกรรมและองค์การ คณะจิตวิทยา จุฬาลงกรณ์มหาวิทยาลัย ถึงการดูแลสุขภาพจิตช่วงโควิด-19 โดย ดร.เจนนิเฟอร์ กล่าวว่า เนื่องด้วยมาจากโรคระบาด COVID-19 ทำให้เรารู้สึกกลัวโรค...</font>
      
    </div>
  </div></a>
      </div>
      <!-- End Portfolio page -->
    
    <!-- HTC -->
    <div class="vg-page page-blog" id="blog" style="border-radius: 0cm;">
      <div id="accordion" style="border-radius: 0cm;">
        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingOne" style="background: #272729 ;border-radius: 0cm;">
            <h5 class="mb-0"><div style="height: 70px"></div><div style="height: 100px;"><font color="#FFFFFF" size="6">FAQ คำถามที่พบบ่อยเกี่ยวกับ COVID-19</font></div>
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >1</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm">&nbsp;&nbsp;&nbsp;กูติดยังวะ?</font>
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="background-color: #353538;" >
            <div class="card-body" ><font size="4px" style="line-height: 3px" color="#FFFFFF" >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ก่อนอื่นขอเรียกคุณนะครับบบ
ถ้าไปตรวจเชื้อโควิด-19 กับโรงพยาบาลแล้วแจ้งมาว่าพบเชื้อ (Detectable) นั่นแปลว่าติดแล้วครับ แม้ทางการแพทย์จะบอกว่าควรตรวจสองรอบ แต่สถานการณ์ตอนนี้ ชุดตรวจวัดขาดแคลนอยู่ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจจะตรวจรอบเดียวไปก่อนได้
ส่วนข้อบ่งชี้อื่นๆ ที่อาจจะบ่งชี้ว่าคุณติดโควิด-19 แล้วก็ได้แก่<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
* ไข้ขึ้นสูง<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
* การรับรสหรือกลิ่นแย่ลง<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
* เหนื่อยล้ามาก<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
* ไอแห้ง<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
* มีอาการปวดเมื่อยกล้ามเนื้อ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
* หายใจลำบาก</font>
            </div>
          </div>
        </div>
        
        
        
        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingTwo" style="background: #272729 ; border-radius: 0cm;" >
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >2</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm ">&nbsp;&nbsp;&nbsp;มีเซ็กส์กับแฟนจะติดโควิดไหมครับ?</font>
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="background-color: #353538;">
            <div class="card-body">
              <font size="4px" style="line-height: 3px" color="#FFFFFF" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                มันต้องถามจริงๆ เนอะ เพราะรอบนี้ท่าจะอีกนาน การสัมผัสใกล้ชิดกัน ยิ่งมีการหายใจรดกัน สัมผัสกันเป็นเวลานาน เหล่านี้ถือเป็นปัจจัยเพิ่มความเสี่ยงของการติดเชื้อได้หมดค่ะ แต่ถ้ามีเพศสัมพันธ์กันโดยห่างกัน 2 เมตร 
                <br><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อย่างที่คุณหมอยงกล่าวไว้ในเฟซบุ๊กส่วนตัวก็ปลอดภัยค่ะ ถ้าทำแบบนี้ไม่ได้ก็อดทนกันหน่อยนะคะ เป็นกำลังใจให้ค่ะ บทความของ Vox ที่พูดถึงแนวปฏิบัติที่ดีที่สุดเกี่ยวกับการมีเพศสัมพันธ์และการออกเดทท่ามกลางสถานการณ์
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การระบาดของไวรัส โดยอ้างความเห็นของแอนนา มัลดูน อดีตที่ปรึกษาด้านนโยบายศาสตร์ ประจำกระทรวงสาธารณสุขและบริการมนุษย์ของสหรัฐฯ บอกว่าแม้จะไม่มีหลักฐานแสดงว่าโควิด-19 ติดต่อทางเพศสัมพันธ์ได้หรือไม่ แต่กิจกรรมทางเพศ
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ก็มักเลี่ยงการต้องใกล้ชิดกัน การหายใจรดใส่กัน การสัมผัสร่างกายอีกฝ่ายไปไม่ได้ ซึ่งสิ่งเหล่านี้ล้วนเพิ่มความเสี่ยงของการติดเชื้อ โดยเฉพาะการจูบที่อาจสามารถแพร่กระจายไวรัสได้ดี
                
                ยังไงก็ลองประเมินจากข้อมูลทั้งหมดนี้ดู แล้วหาทางออกกันนะคะ</font>            </div>
          </div>
        </div>
        
        
        
        
        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingThree" style="background: #272729 ; border-radius: 0cm;">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >3</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm ">&nbsp;&nbsp;&nbsp;กลัวมากเลย ถ้าติดเชื้อจะตายไหมเนี่ย?
                </font>
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="background-color: #353538;">
            <div class="card-body">
              <font size="4px" style="line-height: 3px" color="#FFFFFF" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จะบอกว่าไม่ตายก็เหมือนโกหกครับ แต่โอกาสที่จะเสียชีวิตถือว่าต่ำมากครับ แค่ 6.1% เท่านั้นที่เป็นผู้ป่วยวิกฤติ หากไม่ได้เป็นกลุ่มเปราะบาง อย่างเด็กเล็ก ผู้สูงอายุ ผู้ที่มีโรคประจำตัว ก็วางใจไปได้ส่วนหนึ่งค่ะ แต่อย่างไรเสียหมั่นสังเกตตัวเองกันนะครับ

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายงานจากองค์การอนามัยโลก เข้าไปสำรวจสถานการณ์การระบาดของโรค Covid-19 ในประเทศจีนจากผู้ป่วยกว่า 55,924 ราย พบว่า

ผู้ติดเชื้อส่วนใหญ่กว่า 80% มีอาการของโรคเพียงเล็กน้อยถึงปานกลางเท่านั้น และหายป่วยได้ในที่สุด
ส่วนกลุ่มที่
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาการหนักนั้นมีเพียง 13.8% โดยจะมีอาการหายใจลำบาก หรือหายใจถี่มากกว่า 30 ครั้ง/นาที

ส่วนในผู้ป่วยอีก 6.1% ที่เหลือ เป็นผู้ป่วยขั้นวิกฤติ ที่มักมีอาการระบบหายใจล้มเหลว ช็อค หรืออาจมีอวัยวะส่วนหนึ่งส่วนใดทำงานล้มเหลว และยังมีผู้ที่ยืนยัน
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ว่าติดเชื้อจำนวนหนึ่ง ที่ไม่มีอาการของโรคแสดงออกมาให้เห็นเลย

แต่ฟังอย่างนี้ ก็ไม่ได้แปลว่าจะใช้ชีวิตกันอย่างประมาทนะครับ เราอาจจะไม่เสี่ยง ติดแล้วไม่ตาย แต่เราอาจจะเป็นผู้แพร่เชื้อโรคไปหาคนที่เสี่ยงได้นะครับ</div></div></font>
          </div>
        </div>




        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingFour" style="background: #272729 ; border-radius: 0cm;" >
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >4</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm ">&nbsp;&nbsp;&nbsp;ผมอาจเป็นแล้วหายแล้วก็ได้ใช่ไหมครับ?</font>
              </button>
            </h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" style="background-color: #353538;">
            <div class="card-body">
              <font size="4px" style="line-height: 3px" color="#FFFFFF" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                เป็นไปได้ครับ เพราะเราอาจจะได้รับเชื้อน้อยมากจนร่างกายสามารถสร้างภูมิคุ้มกันได้เอง แต่ยังไงอย่าลืมผักผ่อนให้เพียงพอ รักษาสุขภาพกายและใจ และเลี่ยงพบคนหมู่มากก่อนนะครับ เกิดเชื้อยังหลงเหลืออยู่จะได้ไม่แพร่ให้คนอื่นต่อ

ข้อมูลขององค์การ
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อนามัยโลกบอกว่า จากการเก็บข้อมูลโรคโควิด-19 ในประเทศจีนนั้น ผู้ป่วยที่มีอาการหนักมีเพียง 20% เท่านั้น โดยในผู้ป่วยติดเชื้อบางรายไม่มีอาการแต่อย่างใด และสามารถหายได้เองแม้จะไม่ได้รับการรับยาต้านไวรัสเลยก็ตาม
                
                ยังไงก็ลองประเมินจาก<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลทั้งหมดนี้ดู แล้วหาทางออกกันนะครับ</font>            </div>
          </div>
        </div>


        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingFive" style="background: #272729 ; border-radius: 0cm;" >
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >5</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm ">&nbsp;&nbsp;&nbsp;ตกลงว่าติดโควิดต้องจ่ายเงินเองไหม?</font>
              </button>
            </h5>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion" style="background-color: #353538;">
            <div class="card-body">
              <font size="4px" style="line-height: 3px" color="#FFFFFF" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                รัฐบาลยืนยันครับว่า "รักษาฟรี" ถ้าตรวจแล้วโรงพยาบาลยืนยันว่าพบเชื้อ (Detectable) จำเป็นต้องเข้ารับการรักษา รัฐจะรับผิดชอบทั้งหมดครับ
                แต่ก็แอบมีขอความร่วมมือจากประชาชนว่าถ้าไปโรงพยาบาลเอกชนแล้วมีประกันของตัวเองให้ให้สิทธิ
                
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามนั้นไปก่อน เพื่อช่วยกระจายภาระค่าใช้จ่ายในช่วงวิกฤติหลังจากที่มีประกาศ สธ. เรื่องกำหนดผู้ป่วยฉุกเฉินโรคติดต่ออันตรายตามกฎหมายว่าด้วยโรคติดต่อ ซึ่งครอบคลุมโรคโควิด-19 ใครก็ตามที่เข้าข่ายเป็นผู้สัมผัสเสี่ยงสูง จะได้รับการตรวจ
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;และหากรับเชื้อจะได้รับการรักษาฟรีทั้งหมด ไม่ว่าจะเข้ารับการรักษาที่รพ.ใดก็ตามหากไม่ได้เป็นผู้สัมผัสเสี่ยงสูง หรือเข้าข่ายเสี่ยงตามการประเมินของแพทย์ แต่ยังต้องการเข้ารับการตรวจโดยเฉพาะในรพ.เอกชน ผู้ตรวจก็ต้องรับภาระค่าใช้จ่ายตาม
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่รพ.กำหนดเอง อย่างไรก็ตามหากท้ายที่สุดได้รับการยืนยันว่ารับเชื้อจริง รัฐจะรับผิดชอบค่าใช้จ่ายทั้งหมด


              </font>            </div>
          </div>
        </div>



        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingSix" style="background: #272729 ; border-radius: 0cm;" >
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseTwo" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >6</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm ">&nbsp;&nbsp;&nbsp;โควิด-19 เป็นแล้วเป็นอีกไหม?</font>
              </button>
            </h5>
          </div>
          <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion" style="background-color: #353538;">
            <div class="card-body">
              <font size="4px" style="line-height: 3px" color="#FFFFFF" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                คล้ายกับคนที่เป็นไข้เลือดออกที่เป็นแล้วโอกาสกลับมาเป็นซ้ำได้ยาก โควิด-19 ก็มีการคาดเดาว่าจะเป็นอย่างนั้นค่ะแต่ด้วยเป็นโรคใหม่ยังต้องเก็บรวบรวมข้อมูลอีกมากเลยครับ
โดยหลักการทางไวรัสวิทยาแล้ว ในโคโรนาไวรัส การเป็นแล้วควรจะมี
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภูมิต้านทานที่ใช้ในการป้องกันไม่ให้โรคนี้กลับมาเป็นใหม่ได้ แต่ต้องมีการศึกษาในระยะต่อไปว่าตัวไวรัส จะมีการ
เปลี่ยนแปลงพันธุกรรมเหมือนเช่นในกรณีไข้หวัดใหญ่ที่สามารถเป็นแล้วเป็นอีกได้เนื่องจากสายพันธุ์ของไข้หวัดใหญ่ มีการ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เปลี่ยนแปลงอยู่ทุกปี แต่สำหรับ COVID-19 ขณะนี้ยังไม่เห็นพฤติกรรมของไวรัสนี้เป็นแบบไข้หวัดใหญ่แต่อย่างใด


              </font>            </div>
          </div>
        </div>



        <div class="card" style="border-radius: 0cm;">
          <div class="card-header" id="headingSeven" style="background: #272729 ; border-radius: 0cm;" >
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseTwo" style="box-shadow:0 0 0rem">
                <font  size="10" style="color:#3E3E3E; text-decoration-color: transparent"  face="Tw Cen MT" >7</font><font size="6px" style="text-decoration-color: transparent; color: aliceblue ;box-shadow:0cm ">&nbsp;&nbsp;&nbsp;สั่งเสื้อออนไลน์มาจากจีนจะมีเชื้อติดมาด้วยไหม?</font>
              </button>
            </h5>
          </div>
          <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion" style="background-color: #353538;">
            <div class="card-body">
              <font size="4px" style="line-height: 3px" color="#FFFFFF" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ถ้าของกล่องนั้นไม่ได้วาร์ปมาจากจีนภายใน 24 ชม. หรือบุรุษไปรษณีย์ที่มีเชื้อไอจามใส่ก่อนยื่นถึงมือคุณ คุณก็ไม่ติดหรอกครับ ถ้าจะให้สบายใจเมื่อรับพัสดุมาแล้วก็ทำความสะอาดบรรจุภัณฑ์นั้นเสียด้วยน้ำยาฆ่าเชื้อหรือทิ้งหีบห่อนั้นไป
จากงานวิจัย
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ใหม่ล่าสุดเพิ่งเผยแพร่ผ่าน The New England Journal of Medicine วิจัยว่าเชื้อไวรัส SARS-CoV2 สามารถมีชีวิตรอดและส่งผ่านเชื่อได้หากติดตามอากาศและพื้นผิวต่าง ๆ

<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- กระดาษลัง แบบที่นำมาทำกล่องไปรษณีย์เชื้อได้ 24 ชั่วโมง
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- พลาสติก สแตนเลส คือพื้นผิวที่ไวรัสอยู่ได้นานที่สุด โดยอยู่ได้นานอย่างมากถึง 72 ชั่วโมงหรือเป็นเวลา 3 วัน

ผู้เชี่ยวชาญชี้ว่าไม่ต้องกังวล เนื่องจากกว่าพัสดุจะมาถึงผู้รับก็จะมีไวรัสเหลืออยู่น้อย และความสามารถในการแพร่เชื้อของเจ้าไวรัสจะเสื่อม
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงตามเวลา


              </font>            </div>
      </div>
      </div>
     <!-- End page blog -->
    
    <!-- Page Contact -->
    <div class="vg-page page-contact" id="contact" >
      
    
    </div> <!-- End page contact -->
    
    <!-- Footer -->
     <div class="vg-footer"  >
		<div  align="center"> <img src="..//assets/img/65844_18063020204554.png" style="height: 50px; ">
    
      
        </div>
      </div>
   <!-- End footer -->
   <!-- End main wrapper -->




  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  
  <script src="../assets/vendor/owl-carousel/owl.carousel.min.js"></script>
  
  <script src="../assets/vendor/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  
  <script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>
  
  <script src="../assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
  
  <script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

  <script src="../assets/vendor/wow/wow.min.js"></script>

  <script src="../assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  
  <script src="../assets/js/google-maps.js"></script>
  
  <script src="../assets/js/minibar-virtual.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>
</html>