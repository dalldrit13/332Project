<?php
include 'header.php';
//Add to attendee
$stmt = $dbh->prepare("INSERT INTO attendees VALUES(:fname, :lname)");
$stmt->bindParam(':fname', $givenName);
$stmt->bindParam(':lname', $surname);

//Add to professional
$stmt0 = $dbh->prepare("INSERT INTO professional VALUES(:fname, :lname)");
$stmt0->bindParam(':fname', $givenName);
$stmt0->bindParam(':lname', $surname);

//Add to sponsor
$stmt1 = $dbh->prepare("INSERT INTO sponsor VALUES(:fname, :lname, :compname)");
$stmt1->bindParam(':fname', $givenName);
$stmt1->bindParam(':lname', $surname);
$stmt1->bindParam(':compname', $companyname);

//Add to student
$stmt2 = $dbh->prepare("INSERT INTO student VALUES(:fname, :lname)");
$stmt2->bindParam(':fname', $givenName);
$stmt2->bindParam(':lname', $surname);

//check for any rooms with space
$stmt3 = $dbh->prepare('SELECT room_number, occupancy FROM room WHERE occupancy > 0');

//find max room num
$stmt4 = $dbh->prepare('SELECT MAX(room_number) FROM room');

//add new room
$stmt5 = $dbh->prepare("INSERT INTO room VALUES(:roomNum, 3)");
$stmt5->bindParam(':roomNum', $roomNum);

//add student to room
$stmt6 = $dbh->prepare("INSERT INTO isInRoom VALUES(:fname, :lname, :roomNum)");
$stmt6->bindParam(':fname', $givenName);
$stmt6->bindParam(':lname', $surname);
$stmt6->bindParam(':roomNum', $roomNum);

//reduce Occupancy
$stmt7 = $dbh->prepare("UPDATE room SET occupancy=:occup WHERE room_number=:roomNum");
$stmt7->bindParam(':occup', $occup);
$stmt7->bindParam(':roomNum', $roomNum);

//Add into Attendees
$givenName = $_POST["firstname"];
$surname = $_POST["lastname"];
$stmt->execute();
echo "successfully inserted $givenName $surname";

$type = $_POST["type"];
//If Professional
if($type == 'professional'){
  $stmt0->execute();
}
//If Sponsor
if($type == 'sponsor'){
  $companyname = $_POST["companyname"];
  $stmt1->execute();
  echo "<br> This sponsor is from $companyname and was added to sponsor list";
}
//If Student
if($type == 'student'){
  $stmt2->execute();
  $checkBox = $_POST["roomCheck"];
  //If they need a room
  if($checkBox == 'on'){
    //check for open room
    $stmt3->execute();
    $openRoom = $stmt3->fetch();
    if($openRoom[0] == NULL){
      $stmt4->execute();
      $result = $stmt4->fetch();
      $roomNum = $result[0]+1;
      $stmt5->execute();
      $stmt6->execute();
    }
    else{
      $roomNum = $openRoom[0];
      $stmt6->execute();
      $occup = $openRoom[1]-1;
      $stmt7->execute();
    }
  }
}
//student case and professional case
include 'footer.php';
?>
