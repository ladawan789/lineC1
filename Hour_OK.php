<?php 
    include 'db.php';
?>
<?php 
$tsql = "SELECT COUNT(Scale) as scale
FROM [Camera].[dbo].[MaxH]";
$getRes = $conn->prepare($tsql);
$getRes->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <meta http-equiv="refresh" content="10"> -->

</head>
<style>
.targetOK1 {
  float:left; 
  width:260px ; 
  padding: 10px 50px;
  margin: 40px 0 0px 10px;
  font-family: 'Tahoma', sans-serif;
  text-align: center;
  font-size: 25px;
  font-family: Tahoma, sans-serif;
  font-weight: 500;
  border: 2px solid #28DF99;
  position: relative;
    
}
.target1 {
  float:left; 
  width:50px 30px;
  padding: 60px 40px;
  background-color: #FFF5A5;
  font-family: 'Tahoma', sans-serif;
  text-align: center;
  font-weight: 500;
  margin: 40px 0 0px -200px;
  font-size: 40px;
  position: relative;
}


</style>
<body>
<div class="container">
<div class="target1">  Hour </div> 
    <?php while($row = $getRes->fetch( PDO::FETCH_ASSOC )): ?>
    <div class="targetOK1" style="background-color: #28DF99;"> OK </div>
    <div class="targetOK1"><?php echo $row["scale"] ; ?></div>
    <?php endwhile ?>
</div>
</body>
</html>
