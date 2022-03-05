<?php
$serverName = '10.11.1.65\SQLExpress';
$userName = 'sa_cl';
$userPassword = 'Snc@C001ng';
$dbName = 'Camera';
 
try{
	$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
die(print_r($e->getMessage()));
}
$tsql = "SELECT ROW_NUMBER() OVER(ORDER BY Number, Scale, Date) as Number
,[Scale]
,[Date]
FROM [Camera].[dbo].[LineC1]";
$getRes = $conn->prepare($tsql);
$getRes->execute();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ข้อมูล</title>
</head>
<style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: 0;
}

body {
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #F2F3F4;
    color: #273746;
}

.container {
    margin: 20px auto;
    padding: 0;
    width: 980px;
}

h1 {
    margin-top: 20px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    /* ผสาน border ระหว่าง table กับ td  */
    border-collapse: collapse;
}

table,
td {
    border: 1px solid #5D6D7E;
    text-align: center;
}

thead {
    background-color: #273746;
    color: #BDC3C7;
}

/* Striped Tables: ทำไฮไล์ในการแบ่ง row  */
tr:nth-child(even) {
    background-color: #BDC3C7;
}

td {
    height: 30px;
    vertical-align: center;
}

.name {
    text-align: left;
    padding-left: 16px;
}
</style>
<body>
   <div class="container"></div>
   <h1>ข้อมูลตาราง</h1>
        <table>
            <thead>
                <tr>
                    <td width="auto">Number</td>
                    <td width="25%">Scale</td>
                    <td width="25%">Date</td>
                </tr>
            </thead>
            <tbody>
             <!-- ข้อมูลที่เราจะทำการ fetch จากฐานข้อมูล -->
             <?php while($row = $getRes->fetch( PDO::FETCH_ASSOC )): ?>
               <tr>
                  <td><?php echo $row["Number"] ; ?></td>
                  <td><?php echo $row["Scale"] ; ?></td>
                  <td><?php echo $row["Date"] ; ?></td>
             </tr>
             <?php endwhile ?>
            </tbody>
            </table>
</div>
</body>
</html>