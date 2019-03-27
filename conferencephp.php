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


<!-- ___________________Committee Info____________________________ -->
  <a class='MiniHeading' name = 'committee'>Committee</a>
    <form action='listMember.php' method='post' style='padding-bottom:10vw'>
      <?php $name = 'subcommittee';
      $columnAttr = 'name';
      $tableName = 'Subcommittee';
      require 'MakeSelectBar.php'; ?>
      <input type='submit' class='Button'>
    </form>


<!--___________________Attendee's Info___________________________-->
<a class='MiniHeading' name = 'attendees'> Attendees</a>
<table style='width:100%'>
  <thead>
    <tr>
      <th>
  <p class='MiniHeadingSmall'>Students</p></th>
  <th>
  <p class='MiniHeadingSmall'>Professionals</p></th>
  <th>
  <p class='MiniHeadingSmall'>Sponsors</p></th>
  </tr>
</thead>
<tbody>
<tr>
  <td style='vertical-align:top'>
  <?php $typename = 'student';
  require 'attendeeList.php';?></td>
  <td style='vertical-align:top'>
  <?php $typename = 'professional';
  require 'attendeeList.php';?></td>
  <td style='vertical-align:top'>
  <?php $typename = 'sponsor';
  require 'attendeeList.php';?></td>
</tr>
</tbody>
</table>

<table style='width:100%'>
  <thead>
  <tr>
<!--___________________Add Attendee___________________________-->
    <th style='text-align:left'>
  <p class='MiniHeadingSmall'>Add an attendee</p>
  <form class='addForm' action='addAttendee.php' method='post'>
    <p class='MiniText'>First Name</p>
    <input type='text' name='firstname' class='textBox'>
    <input type='checkbox' name='roomCheck' class='tick'> If student and needs room
    <p class='MiniText'>Last Name</p>
    <input type='text' name='lastname' class='textBox'>
    <select class='select' style='width:15vw' name="type">
      <option value="student">Student</option>
      <option value="professional">Professional</option>
      <option value="sponsor">Sponsor</option>
    </select>
    <p class='MiniText'>Company Name (If Sponsor)</p>
    <?php $name = 'companyname';
    $columnAttr = 'name';
    $tableName = 'company';
    require 'MakeSelectBar.php'; ?>
    <input type='submit'  class='Button'>
  </form></th>
<!--___________________Room Occupancy___________________________-->
  <th>
  <p class='MiniHeadingSmall'>Select a room to show the occupants</p>
  <form action='ListRoomOccupant.php' method='post'>
    <?php $name = 'roomNum';
    $columnAttr = 'room_number';
    $tableName = 'room';
    require 'MakeSelectBar.php'; ?>
    <input type='submit' class='Button'>
  </form>
</th>
<thead>
</table>
  <div style='width:100%; height:500px'></div>


<!--___________________Sppnsor Info___________________________-->
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
  </tr>
<?php endforeach;
endif; ?>
</tbody>
</table>

<!--Table for sponsors and the job postings-->
<p class='MiniHeadingSmall'>Job Postings</p>
<table class='table_sponsor MiniText'>
  <thead>
    <tr>
      <th>Company Name</th>
      <th>Job Posting</th>
      <th>City</th>
      <th>Province</th>
      <th>Pay/hour</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM job_posting";
    $stmt2 = $dbh->prepare($sql);
    $stmt2->execute();
    $rows = $stmt2->fetchAll();
    if(!is_array($rows)){
      print_r($rows);
      echo "error no companies or job postings yet";
    }
    if(is_array($rows)):
      foreach($rows as $row):
     ?>
     <tr>
       <td><?php echo $row[0];?></td>
       <td><?php echo $row[1];?></td>
       <td><?php echo $row[2];?></td>
       <td><?php echo $row[3];?></td>
       <td><?php echo $row[4];?></td>
     </tr>
   <?php endforeach;
   endif; ?>
  </tbody>
</table>

<!--look at a specific companies job postings-->
<br>
<p class='MiniHeadingSmall'> Select Company to look at job postings </p>

<form action='listJobs.php' method='post' style='padding-bottom:10vw'>
        <select class='select' name='job_listing'>
          <?php
          $sql = "SELECT Distinct company_name FROM job_posting";
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          if(!is_array($rows)){
            print_r($rows);
            echo "error no Companies";
          }
          if(is_array($rows)):
          foreach($rows as $row):?>
            <option value=<?php echo $row[0]?>><?php echo $row[0];?></option>
        <?php endforeach;
        endif; ?>
        </select>
      <input type='submit' class='Button'>
    </form>


<!--___________________Breakdown Info___________________________-->
  <a class='MiniHeading' name = 'breakdown'> Breakdown</a>
  <div style='width:100%; height:500px'></div>

</body>

</html>
