<?php 
    include 'db.php';
?>
<?php 
$tsql = "SELECT COUNT(Scale) as scale
FROM [Camera].[dbo].[Min]";
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
<!--   <meta http-equiv="refresh" content="5"> --> 

</head>
<style>
.targetNG1 {
  float:left; 
  width:260px ; 
  padding: 12px 50px;
  margin: -63px 0 0px 10px;
  font-family: 'Tahoma', sans-serif;
  text-align: center;
  font-size: 25px;
  font-family: Tahoma, sans-serif;
  font-weight: 500;
  border: 2px solid #FF9292;
  position: relative;
    
}
</style>
<body>
<div class="container">
    <?php while($row = $getRes->fetch( PDO::FETCH_ASSOC )): ?>
    <div class="targetNG1" style="background-color: #FF9292;"> NG </div>
    <div class="targetNG1"><?php echo $row["scale"] ; ?></div>
    <?php endwhile ?>
</div>
</body>
</html>
