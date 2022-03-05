<?php 
    include 'db.php';
?>
<?php 
$tsql = "SELECT 
COUNT(*) AS [Scale] 
FROM [Camera].[dbo].[LineC1]
where date BETWEEN '2022-2-15' AND '2022-2-16' 
";
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
.hour3 {
  float:left; 
  width:300px;
  padding: 15px;
  border: 2px solid #FFDA77;
  margin: -50px 0 0 700px;
  text-align: center;
  font-family: 'Tahoma', sans-serif;
  font-weight: 500;
  position: sticky;
  font-size: 25px;
  bottom: 20px;
  position: relative;
}
.hour7 {
  float:left; 
  width:300px;
  padding: 15px;
  border: 2px solid #FFDA77;
  margin: -70px 0 0 1100px;
  text-align: center;
  font-family: 'Tahoma', sans-serif;
  font-weight: 500;
  position: sticky;
  font-size: 25px;
  bottom: 20px;
  position: relative;
}
</style>
<body>
<div class="container">
    <?php while($row = $getRes->fetch( PDO::FETCH_ASSOC )): ?>
    <div class="hour3">  Actual per Day</div>
    <div class="hour7 " style="background-color: #FFDA77"><?php echo $row["Scale"] ; ?></div>
    <?php endwhile ?>

</div>
</body>
</html>
