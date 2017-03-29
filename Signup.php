<?php

require './Models/Credentials.php';

mysql_connect($host, $user, $passwd) or die(mysql_error());
mysql_select_db($database);

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$query = sprintf("INSERT INTO `user` (`first`, `last`, `uid`, `pwd`) VALUES('%s', '%s', '%s', '%s')",
 mysql_real_escape_string($first),
 mysql_real_escape_string($last),
 mysql_real_escape_string($uid),
 mysql_real_escape_string($pwd));

mysql_query($query);

header("Location: index.php");



?>

