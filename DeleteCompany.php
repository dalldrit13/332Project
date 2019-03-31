<?php
include 'header.php';


$stmt = $dbh->prepare("DELETE FROM company WHERE name = (:compname)");
$stmt->bindParam(':compname', $compName);
$compName = $_POST["companyname"];
$stmt->execute();

//Add
echo "$compName has been deleted from the conference";

include 'footer.php';
?>
