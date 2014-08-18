<?php
$q=$_GET["q"];

$con = mysqli_connect("localhost","cipd8877","Novelit4","test");
if (!$con) {
  die('No se pudo conectar: ' . mysqli_error($con));
}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT questionID, question FROM questions WHERE questionType = '".$q."' ORDER BY RAND() LIMIT 1";

$result = mysqli_query($con,$sql);

$questionID = 0;
echo "<div>";

while($row = mysqli_fetch_array($result)) {
  $questionID = utf8_encode($row['questionID']);
  echo "<br>" . utf8_encode($row['question']). "</br>";
}
echo "</div>";

$sql="SELECT answerID, answer FROM answers WHERE questionID = '".$questionID."' ORDER BY RAND()";
$result = mysqli_query($con,$sql);
echo "<div>";

while($row = mysqli_fetch_array($result)) {
    $answerID = $row['answerID'];
    $answerDescription = utf8_encode($row['answer']);
    $buttonFirstPart = "<input type='button' value='";
    $buttonSecondPart = "' onClick=evaluateAnswer(";
    $buttonThirdPart = ")>";
    
  echo $buttonFirstPart.$answerDescription.$buttonSecondPart.$answerID.$buttonThirdPart;
}
mysqli_close($con);
?>