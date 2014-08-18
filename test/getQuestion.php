<?php
$q=$_GET["q"];

echo $q;

$con = mysqli_connect("localhost","cipd8877","Novelit4","test");
if (!$con) {
  die('No se pudo conectar: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM questions WHERE questionID = '".$q."'";

$result = mysqli_query($con,$sql);


echo "<table border='1'>
<tr>
<th>question</th>
<th>questionType</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
 
  echo "<tr>";
  echo "<td>" . $row['question'] . "</td>";
  echo "<td>" . $row['questionType'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>