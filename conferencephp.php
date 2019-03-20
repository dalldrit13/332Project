<!doctype html>
<html class="no-js" lang="">

<head>
  <link rel="stylesheet" href="conference.css">

</head>

<body>
  <?php
  $dbh = new PDO("mysql:host=localhost;dbname=Conference_332", "root", "");
  ?>
  <header class="header-bg" style= 'background-size: 100%; height:50vw'>
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
<div style='width:100%; height:500px'>
    <form action='listMember.php' method='post'>
        <select class='select' name='subcommittee'>
          <option value="Program">Program</option>
          <option value="Sponsors">Sponsors</option>
          <option value="Registration">Registration</option>
          <option value="Finance">Finance</option>
          <option value="Room Assignment">Room Assignment</option>
        </select>
      <input type='submit'>
    </form>
  </div>
  <a class='MiniHeading' name = 'attendees'> Attendees</a>
  <form action='addAttendee.php' method='post'>
    <p>First Name</p>
    <input type='text' name="firstname">
    <br>
    <p>Last Name</p>
    <input type='text' name='lastname'>
    <input type='submit'>
  </form>
  <div style='width:100%; height:500px'></div>
  <a class='MiniHeading' name = 'sponsors'> Sponsors</a>

  <div style='width:100%; height:500px'></div>
  <a class='MiniHeading' name = 'breakdown'> Breakdown</a>
  <div style='width:100%; height:500px'></div>

</body>

</html>
