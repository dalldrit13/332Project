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
    $stmt1 = $dbh->prepare("SELECT session_name, start_time, end_time, location FROM presentation WHERE day = $day ORDER BY start_time ASC");
    $stmt1->execute();
    $rows = $stmt1->fetchAll();
    $i = 1;
      foreach($rows as $row):
     ?>
     <form class='addForm' action='changeSchedule.php' method='post'>
       <tr class='schedule'>
         <td><?php echo $row[0];?><input type='hidden' name='session<?php echo $day; echo $i;?>' value='<?php echo $row[0];?>'></td>
         <td><input type='hidden' name='startTime<?php echo $day; echo $i;?>' value='<?php echo $row[1];?>'>
         <input class='textBox' style='width:4vw' type='text' name='newStartTime<?php echo $day; echo $i;?>' value='<?php echo $row[1];?>'></td>
         <td><input type='hidden' name='endTime<?php echo $day; echo $i;?>' value='<?php echo $row[2];?>'>
         <input class='textBox' style='width:4vw'type='text' name='newEndTime<?php echo $day; echo $i;?>' value='<?php echo $row[2];?>'></td>
         <td><input type='hidden' name='location<?php echo $day; echo $i;?>' value='<?php echo $row[3];?>'>
         <input class='textBox' type='text' name='newLocation<?php echo $day; echo $i;?>' value='<?php echo $row[3];?>'>
         <input type='hidden' name='dayChange' value='0'>
         <input type='checkbox' name='dayChange' class='tick'> switch day
         <input type='hidden' name='Day' value='<?php echo $day?>'>
         <input type='hidden' name='rowNum' value='<?php echo $day; echo $i;?>'>
         <input type='submit' class='textBox' style='border-radius:4px' value='Change'></td>
         <?php $i = $i+1;?>
       </tr>
     </form>
    <?php endforeach;?>
  </tbody>
  </table>
</body>
</html>
