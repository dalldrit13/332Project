<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
<?php
require 'header.php';

$sql = "UPDATE presentation SET start_time=:newStartTime, end_time=:newEndTime, location=:newLocation, day=:newDay WHERE session_name=:session AND start_time=:startTime AND day=:day;";
$stmt4 = $dbh->prepare($sql);
$stmt4->bindParam(':newStartTime',$newStartTime);
$stmt4->bindParam(':newEndTime',$newEndTime);
$stmt4->bindParam(':newLocation',$newLocation);
$stmt4->bindParam(':newDay',$newDay);
$stmt4->bindParam(':session', $session);
$stmt4->bindParam(':startTime',$startTime);
$stmt4->bindParam(':day',$day);

$session = $_POST["session".$_POST['rowNum']];
$startTime = $_POST["startTime".$_POST['rowNum']];
$endTime = $_POST["endTime".$_POST['rowNum']];
$location = $_POST["location".$_POST['rowNum']];
$day = $_POST['Day'];

?><p class='MiniHeadingSmall'>Presentation</p>
<?php echo $session.'<br>';
echo 'starting at '.$startTime.'<br>';
echo 'ending at '.$endTime.'<br>';
echo 'in '.$location.'<br>';
echo 'on day '.$day.'<br>';

$newStartTime = $_POST["newStartTime".$_POST['rowNum']];
$newEndTime = $_POST["newEndTime".$_POST['rowNum']];
$newLocation =$_POST["newLocation".$_POST['rowNum']];
$newDay = $day;
if($_POST['dayChange'] == 'on'){
$newDay = ($day%2)+1;
}

?><p class='MiniHeadingSmall'>Changed to</p>
<?php
echo 'start at '.$newStartTime.'<br>';
echo 'end at '.$newEndTime.'<br>';
echo 'in '.$newLocation.'<br>';
echo 'on day '.$newDay;

$stmt4->execute();

require 'footer.php';
?>
</body>
</html>
