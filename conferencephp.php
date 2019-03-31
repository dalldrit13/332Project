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
      <a href="#schedule">Schedule</a>
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
    <form action='listMember.php' method='post'>

      <?php $name = 'subcommittee';
      $columnAttr = 'name';
      $tableName = 'Subcommittee';
      require 'MakeSelectBar.php'; ?>

      <input type='submit' class='Button'>
    </form>
    <div style='height:10vw; width:100%'></div>


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
    <input type='hidden' name='roomCheck' value='0'>
    <input type='checkbox' name='roomCheck' class='tick'> If student and needs room
    <p class='MiniText'>Last Name</p>
    <input type='text' name='lastname' class='textBox'>
    <select class='select' style='width:15vw' name="type">
      <option value="student">Student</option>
      <option value="professional">Professional</option>
      <?php require 'companyExists.php';
      if($rows!=null):?>
      <option value="sponsor">Sponsor</option>
    <?php endif;?>
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
<div style='height:10vw; width:100%'></div>

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
  if(($rows == null)){
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
<table style='width:100%'>
  <thead>
    <tr>
      <th>
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
    if($rows == NULL){
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
</th>

<th>
<!--look at a specific companies job postings-->
<br>
<p class='MiniHeadingSmall'> Select Company to look at job postings </p>

<form action='listJobs.php' method='post' style='padding-bottom:2vw'>
  <?php $name = 'job_listing';
  $columnAttr = 'company_name';
  $tableName = 'job_posting';
  require 'MakeSelectBar.php';
  if($rows!=null):?>
      <input type='submit' class='Button'>
    <?php endif;?>
    </form></th>
  </tr>
  </thead>
</table>



<table style='width:100%'>
  <thead>
    <tr>
      <th>
    <!--Add a company to the database-->
    <p class='MiniHeadingSmall'>Add a Company</p>
    <form action='addCompanytoDataBase.php' method='post' style='padding-bottom:2vw'>
    <p class='MiniText'>Company Name</p>
    <input type='text' name='companyname' class='textBox'>
    <select class='select' style='width:15vw' name="level">
      <option value="Bronze">Bronze</option>
      <option value="Silver">Silver</option>
      <option value="Gold">Gold</option>
      <option value="Platinum">Platinum</option>
    </select>
    <input type='submit'  class='Button'>
    </form></th>

    <th>
    <!--Delete a company from the database-->
    <p class='MiniHeadingSmall'> Select Company to Delete </p>
    <form action='DeleteCompany.php' method='post'>
      <?php $name = 'companyname';
      $columnAttr = 'name';
      $tableName = 'company';
        require 'MakeSelectBar.php'; ?>
        <?php
        if($rows!=null):?>
      <input type='submit' class='Button'>
    <?php endif;?>
    </form></th>
  </tr>
  </thead>
</table>

  <div style='height:10vw; width:100%'></div>

<!--___________________Schedule___________________________-->
  <a class='MiniHeading' name ='schedule'> Schedule</a>
  <table style='width:100%'>
    <thead>
      <tr>
        <th>
    <p class='MiniHeadingSmall'>Day 1</p></th>
    <th>
    <p class='MiniHeadingSmall'>Day 2</p></th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td style='vertical-align:top'>
    <?php $day = 1;
    require 'schedule.php';?></td>
    <td style='vertical-align:top'>
    <?php $day = 2;
    require 'schedule.php';?></td>
  </tr>
  </tbody>
  </table>

  <div style='height:10vw; width:100%'></div>
<!--___________________Breakdown Info___________________________-->
  <a class='MiniHeading' name = 'breakdown'> Breakdown</a>
  <table class='table_sponsor MiniText'>
    <thead>
      <tr>
        <th style='font-size:4vw'>Source</th>
        <th style='font-size:4vw'>Funds</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
      $sql = "SELECT COUNT(name) FROM company WHERE sponsorship_level = :sponsorLevel";
      $stmt2 = $dbh->prepare($sql);
      $stmt2->bindParam(':sponsorLevel', $sponsor_level);
      $sponsor_level = 'Bronze';
      $stmt2->execute();
      $bronze = $stmt2->fetch();
      $sponsor_level = 'Silver';
      $stmt2->execute();
      $silver = $stmt2->fetch();
      $sponsor_level = 'Gold';
      $stmt2->execute();
      $gold = $stmt2->fetch();
      $sponsor_level = 'Platinum';
      $stmt2->execute();
      $platinum = $stmt2->fetch();
      $sponsor = ($bronze[0]*1000)+($silver[0]*3000)+($gold[0]*5000)+($platinum[0]*10000);?>
      <td style='font-size:3vw'>Sponsorship</td>
      <td style='font-size:3vw'>$<?php echo $sponsor?></td></tr>
      <tr>
      <?php
      $sql = "SELECT COUNT(first_name) FROM student";
      $stmt2 = $dbh->prepare($sql);
      $stmt2->execute();
      $totalStudents = $stmt2->fetch();
      $studentAmount = $totalStudents[0]*50;
      ?>
      <td style='font-size:3vw'>Students</td>
      <td style='font-size:3vw'>$<?php echo $studentAmount?></td></tr>
      <tr>
        <?php
        $sql = "SELECT COUNT(first_name) FROM professional";
        $stmt2 = $dbh->prepare($sql);
        $stmt2->execute();
        $totalPros = $stmt2->fetch();
        $ProAmount = $totalPros[0]*50;
        ?>
      <td style='font-size:3vw'>Professionals</td>
      <td style='font-size:3vw'>$<?php echo $ProAmount?></td></tr>
      <td style='font-size:3vw'>Total</td>
      <td style='font-size:3vw'>$<?php $total = $sponsor+$studentAmount+$ProAmount;
      echo $total;?></td>
    </tbody>
  </table>
  <div style='height:10vw; width:100%'></div>
</body>

</html>
