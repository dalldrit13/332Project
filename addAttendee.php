<?php
include 'header.php';
$stmt = $dbh->prepare("insert into attendees values(:fname, :lname)");
$stmt->bindParam(':fname', $givenName);
$stmt->bindParam(':lname', $surname);

$stmt2 = $dbh->prepare("insert into sponsor values(:fname, :lname, :compname)");
$stmt2->bindParam(':fname', $givenName);
$stmt2->bindParam(':lname', $surname);
$stmt2->bindParam(':compname', $companyname);

$givenName = $_POST["firstname"];
$surname = $_POST["lastname"];
$stmt->execute();
echo "successfully inserted $givenName $surname";
$type = $_POST["type"];
if($type == 'sponsor'){
  $companyname = $_POST["companyname"];
  echo "<br> This sponsor is from $companyname and was added to sponsor list";
  $stmt2->execute();
}
//student case and professional case
include 'footer.php';
?>
