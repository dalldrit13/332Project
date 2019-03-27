<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="conference.css">
</head>

<body>
  <?php
  require 'header.php';
  ?>
  <header class="header-bg" style= 'background-size: 100%; height:40vw'>
    <div class="topnav">
      <a href="#committee">Committee</a>
      <a href="#attendees">Attendees</a>
      <a href="#sponsors">Sponsors</a>
      <a href="#breakdown">Breakdown</a>
    </div>
  </nav>
    <!--<div class='container'>-->
    <div style='height:90%; position:relative'>
      <div style='position: absolute; bottom:0; left:0'>
        <div class='Header-title1' style='padding-left:2vw'>
          Queen's Database Management
        </div><br><br>
        <div class='Header-title2' style='padding-left:2vw'>
          CONFERENCE
        </div>
      </div>
    </div>
  </header>
  <a class='MiniHeading' name = 'committee'>Committee</a>
    <form action='listMember.php' method='post' style='padding-bottom:10vw'>
        <select class='select' name='subcommittee'>
          <?php
          $sql = "SELECT name FROM Subcommittee";
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          if(!is_array($rows)){
            print_r($rows);
            echo "error no Subcommittees";
          }
          if(is_array($rows)):
          foreach($rows as $row):?>
            <option value=<?php echo $row[0]?>><?php echo $row[0];?></option>
        <?php endforeach;
        endif; ?>
        </select>
      <input type='submit' class='Button'>
    </form>
  <a class='MiniHeading' name = 'attendees'> Attendees</a>
  <form action='addAttendee.php' method='post'>
    <p>First Name</p>
    <input type='text' name="firstname">
    <p>Last Name</p>
    <input type='text' name='lastname'>
    <select name="type" onchange='CheckSponsor(this.value);'>
      <option value="student">Student</option>
      <option value="professional">Professional</option>
      <option value="sponsor">Sponsor</option>
    </select>
    <p>Company Name (If Sponsor)</p>
    <input type="text" name="companyname">
    <input type='submit'  class='Button'>
  </form>
  <form action='ListRoomOccupant.php' method='post'>
      <select class='select' name='roomNum'>
        <?php
        $sql = "SELECT room_number FROM room";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        if(!is_array($rows)){
          print_r($rows);
          echo "error no rooms booked";
        }
        if(is_array($rows)):
        foreach($rows as $row):?>
          <option value=<?php echo $row[0]?>><?php echo $row[0];?></option>
      <?php endforeach;
      endif; ?>
      </select>
    <input type='submit' class='Button'>
  </form>
  <div style='width:100%; height:500px'></div>
  <a class='MiniHeading' name = 'sponsors'> Sponsors</a>
<table class='table_sponsor MiniText'>
  <thead>
    <tr>
      <th style='border-right:solid 0.2vw; border-color:#33446a'>Company Name</th>
      <th>Sponsor Level</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT name, sponsorship_level FROM company";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll();
  if(!is_array($rows)){
    print_r($rows);
    echo "error no companies yet";
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
  <div style='width:100%; height:500px'></div>
  <a class='MiniHeading' name = 'breakdown'> Breakdown</a>
  <div style='width:100%; height:500px'></div>

</body>

</html>
