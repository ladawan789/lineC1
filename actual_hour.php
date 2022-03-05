<?php 
    include 'db.php';
?>
<?php 
$tsql = "SELECT COUNT(Scale) as scale
FROM [Camera].[dbo].[Vw_h]";
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
.hour1 {
  float:left; 
  width:300px;
  padding: 15px;
  border: 2px solid #FFDA77;
  margin: -290px 0 0 700px;
  text-align: center;
  font-family: 'Tahoma', sans-serif;
  font-weight: 500;
  font-size: 25px;
  position: relative;
}
.hour5 {
  float:left; 
  width:300px;
  padding: 15px;
  border: 2px solid #FFDA77;
  margin: -290px 0 0 1100px;
  text-align: center;
  font-family: 'Tahoma', sans-serif;
  font-weight: 500;
  position: relative;
  font-size: 25px;
}
</style>
<body>
<div class="container">
    <?php while($row = $getRes->fetch( PDO::FETCH_ASSOC )): ?>
    <div class="hour1">  Actual per Hour </div>
    <div class="hour5 " style="background-color: #FFDA77"><?php echo $row["scale"] ; ?></div>
    <?php endwhile ?>

</div>
</body>
</html>
