<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
    <?php
    $sql = "SELECT DISTINCT $columnAttr FROM $tableName";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    if($rows==null){
      echo "error no ".$tableName."s";
    }
    if($rows!=null):?>
      <select class='select' name=<?php echo $name?>>
    <?php
    foreach($rows as $row):?>
      <option value=<?php echo $row[0]?>><?php echo $row[0];?></option>
  <?php endforeach;
endif; ?>
  </select>
</body>
</html>
