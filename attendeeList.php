<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
  <table class='table_sponsor' style='text-align:center; width:100%'>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT first_name, last_name FROM $typename";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    if(($rows == null)){
      echo "error no ".$typename." attendees yet";
    }
    if(is_array($rows)):
    foreach($rows as $row):?>
    <tr>
      <td><?php echo $row[0];?></td>
      <td><?php echo $row[1];?></td>
    </tr>
  <?php endforeach;
  endif; ?>
  </tbody>
  </table>
</body>
</html>
