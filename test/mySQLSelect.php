<html>
     <head>
        <title>Resultado SELECT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<?php
  $loginName = $_GET['loginName'];
  $con=mysqli_connect("localhost","cipd8877","Novelit4","test");
// Check connection
  echo $loginName;
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM prueba
WHERE loginName='{$loginName}'");

while($row = mysqli_fetch_array($result)) {
  echo $row['loginName'] . " " . $row['password'];
  echo "<br>";
}
?>
</body>
</html>  