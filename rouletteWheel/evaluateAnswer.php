<?php
$ans=filter_input(\INPUT_GET, 'ans');

$con = mysqli_connect("localhost","cipd8877","Novelit4","test");
if (!$con) {
  die('No se pudo conectar: ' . mysqli_error($con));
}

$sql="SELECT right_answer FROM answers WHERE answerID = '".$ans."' LIMIT 1";

$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
  $isCorrect = $row['right_answer'];
  $message = "INCORRECTA";
  if( 1 == $isCorrect){
      $message = "CORRECTO";
  }
}
echo $message;
mysqli_close($con);
exit;