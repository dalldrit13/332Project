<?php
include 'header.php';
//Add to company
$stmt = $dbh->prepare("INSERT INTO company VALUES(:name, :level, :email)");
$stmt->bindParam(':name', $Name);
$stmt->bindParam(':level', $CompLevel);
$stmt->bindParam(':email', $Email);

$Name = $_POST["companyname"];
$CompLevel = $_POST["level"];

//add number of emails
if($CompLevel == 'Bronze'){
  $Email = 0;
}elseif($CompLevel == 'Silver'){
  $Email = 3;
}elseif($CompLevel == 'Gold'){
  $Email = 4;
}elseif($CompLevel == 'Platinum'){
  $Email = 5;
}

$stmt->execute();

//Add
echo "successfully inserted $Name $CompLevel";


include 'footer.php';
?>
