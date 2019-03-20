<!doctype html>
<html>
<body>
<h1>Members</h1>
<?php
$dbh = new PDO("mysql:host=localhost;dbname=Conference_332", "root", "");
$subName = $_POST["subcommittee"];
$rows = $dbh->query("select firstname, lastname from ismember where committeename=$subName");
echo $rows?>
</body>
</html>
