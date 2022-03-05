<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'db.php';
//คิวรี่ข้อมูล
$stmt = $conn->prepare("
SELECT TOP (1000) [Number]
            ,[Scale]
            ,[Date]
        FROM [Camera].[dbo].[Vw_h]
  ");
$stmt->execute();
$result = $stmt->fetchAll();

//นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมูลให้ถูกโครงสร้างของกราฟที่ใช้ 
$Scale = array();
$Date = array();
foreach ($result as $rs) {
  $Scale[] = "\"".$rs['Scale']."\""; 
  $Date[] = "\"".$rs['Date']."\""; 
}

//ตัด commar อันสุดท้ายโดยใช้ implode เพื่อให้โครงสร้างข้อมูลถูกต้องก่อนจะนำไปแสดงบนกราฟ
$Scale = implode(",", $Scale); 
$Date = implode(",", $Date); 

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- call js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
  </head>
              <!--devbanban.com-->
              <canvas id="myChart" style="width: 100%; height: 400px;"></canvas>
              <script>
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: [<?php echo $Date;?>

                      ],
                      datasets: [{
                          label: 'Actual per Hour',
                          data: [<?php echo $Scale;?>
                          ],
                          fill: false,
                          backgroundColor: [
                              //'rgba(255, 99, 132, 0.2)',
                              //'rgba(54, 162, 235, 0.2)',
                             // 'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                             // 'rgba(153, 102, 255, 0.2)',
                             // 'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              //'rgba(255,99,132,1)',
                              //'rgba(54, 162, 235, 1)',
                              //'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              //'rgba(153, 102, 255, 1)',
                              //'rgba(255, 159, 64, 1)'
                          ],
                          /* borderWidth: 3 */
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
              </script>
  <body>
   
  </body>
</html>