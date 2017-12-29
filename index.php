<?php include_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hello world</title>
</head>
<body>
<p>Hello world<?php echo " version 2"; ?></p>
<p>Database value is <?php echo getSampleDataFromDB(); ?></p>
</body>
</html>