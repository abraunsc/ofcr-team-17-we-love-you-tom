<?php
// 0. Validate my data

//$_GET, $_POST, $_ENV, $_SERVER
//super global variables, associative arrays
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$stmt = $db->prepare('UPDATE Certificate
  SET certAgency = ?, certName = ?, defaultExpPeriod = ? WHERE certId = ?');
$stmt->execute([
  $_POST['certAgency'],
  $_POST['certName'],
  $_POST['defaultExpPeriod'],
  $_POST['certId'],
]);

//TODO: Error checking

header('HTTP/1.1 303 See Other');
header('Location: ../records/fetchCerts.php');
//303 go somewhere else
