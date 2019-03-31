<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
    <?php
    $sql = "SELECT DISTINCT name FROM company";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();?>
</body>
</html>
