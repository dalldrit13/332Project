<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
<h1>Members of <?php echo $_POST["subcommittee"];?> SubCommittee </h1>
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
  $sql = "SELECT firstname,lastname FROM ismember WHERE committeename = :subCname";
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':subCname', $subName);
  $subName = $_POST["subcommittee"];
  $stmt->execute();
  $rows = $stmt->fetchAll();
  if(!is_array($rows)){
    print_r($rows);
    echo "error no members";
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
