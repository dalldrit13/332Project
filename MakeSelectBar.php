<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
  <select class='select' name=<?php echo $name?>>
    <?php
    $sql = "SELECT DISTINCT $columnAttr FROM $tableName";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    if(!is_array($rows)){
      print_r($rows);
      echo "error no $tableName s";
    }
    if(is_array($rows)):
    foreach($rows as $row):?>
      <option value=<?php echo $row[0]?>><?php echo $row[0];?></option>
  <?php endforeach;
  endif; ?>
  </select>
</body>
</html>
