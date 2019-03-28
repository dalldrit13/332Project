<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="conference.css">
</head>
<body>
  <table class='table_sponsor' style='text-align:center; width:100%'>
    <thead>
      <tr>
        <th>Session</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>location</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $stmt1 = $dbh->prepare("SELECT session_name, start_time, end_time, location FROM session WHERE day = $day ORDER BY start_time ASC");
    $stmt1->execute();
    $rows = $stmt1->fetchAll();
      foreach($rows as $row1):
     ?>
     <form>
       <tr class='schedule'>
         <td><a href='footer.php'><?php echo $row1[0];?></a></td>
         <td><?php echo $row1[1];?></td>
         <td><?php echo $row1[2];?></td>
         <td><?php echo $row1[3];?></td>
       </tr>
     </form>
    <?php endforeach;?>
  </tbody>
  </table>
</body>
</html>
