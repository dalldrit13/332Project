<!DOCTYPE html>
<html>
<head>
<link href="stylesheet.css" type="text/css" rel="stylesheet" >
</head>
<body>
  <h1>Occupants of room <?php echo $_POST["roomNum"];?></h1>
  <br>
  <table class='table_sponsor MiniText'>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>
    <tbody>
    <?php
    require 'header.php';
    $sql = "SELECT first_name,last_name FROM isInRoom WHERE room_number = :roomNumber";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':roomNumber', $roomNum);
    $roomNum = $_POST["roomNum"];
    $stmt->execute();
    $rows = $stmt->fetchAll();
    if(!is_array($rows)){
      print_r($rows);
      echo "error no occupants";
    }
    if(is_array($rows)):
    foreach($rows as $row):?>
    <tr>
      <td><?php echo $row[0];?></td>
      <td><?php echo $row[1];?></td>
    </tr/>
  <?php endforeach;
  endif; ?>
  </tbody>
  </table>
  <?php include 'footer.php';?>
  </body>
  </html>
