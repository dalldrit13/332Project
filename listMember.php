<!doctype html>
<html>
<body>
<h1>Members of <?php echo $_POST["subcommittee"];?> SubCommittee </h1>
<?php include 'header.php';
$subName = $_POST["subcommittee"];
$rows = $dbh->query("select firstname, lastname from ismember where committeename=$subName");
echo $rows?>
</body>
</html>
