<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>logout</title>
</head>
<?php
session_start();
session_unset();
session_destroy();
header('location:effects.php');
?>
<body>
</body>
</html>