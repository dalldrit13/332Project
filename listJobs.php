<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
<h1>Jobs with <?php echo $_POST["job_listing"];?> </h1>
<br>
<table class='table_sponsor MiniText'>
  <thead>
    <tr>
      <th>Jobs</th>
      <th>City</th>
      <th>Province</th>
      <th>Pay</th>
    </tr>
  </thead>
  <tbody>
  <?php
  require 'header.php';
  $sql = "SELECT job_title, city, province, pay_h FROM job_posting WHERE company_name = :CompName";
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':CompName', $compname);
  $compname = $_POST["job_listing"];
  $stmt->execute();
  $rows = $stmt->fetchAll();
  if(!is_array($rows)){
    print_r($rows);
    echo "error no jobs";
  }
  if(is_array($rows)):
  foreach($rows as $row):?>
  <tr>
    <td><?php echo $row[0];?></td>
    <td><?php echo $row[1];?></td>
    <td><?php echo $row[2];?></td>
    <td><?php echo $row[3];?></td>
  </tr/>
<?php endforeach;
endif; ?>
</tbody>
</table>
<?php include 'footer.php';?>
</body>
</html>
