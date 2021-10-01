<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "covid");
$query = "SELECT * FROM covid";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{

 $chart_data .= "{ infect:'".$row["infect"]."', recovered:".$row["recovered"].", death:".$row["death"].", date:'".$row["date"]."'}, ";
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
 <body>
  <br /><br />
  <div class="container" style="width: 1200px;px;">
    
   <br /><br />
   <div id="chart"></div>
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
 stacked:true
});
</script>