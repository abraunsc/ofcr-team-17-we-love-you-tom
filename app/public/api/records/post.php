<?php
// 0. Validate my data

//$_GET, $_POST, $_ENV, $_SERVER
//super global variables, associative arrays
use Ramsey\Uuid\Uuid;
$personId = Uuid::uuid4()->toString();
// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$stmt = $db->prepare('INSERT INTO Person
  (personId, firstName, lastName, address, email, dob, gender, startDate, position, radioNumber)
  VALUES (?,?,?,?,?,?,?,?,?,?)');
$stmt->execute([
  $personId,
  $_POST['firstName'],
  $_POST['lastName'],
  $_POST['address'],
  $_POST['email'],
  $_POST['dob'],
  $_POST['gender'],
  $_POST['startDate'],
  $_POST['position'],
  $_POST['radioNumber']
]);

//TODO: Error checking

header('HTTP/1.1 303 See Other');
header('Location: ../records/?guid='.$personId);
//303 go somewhere else

// patientGuid VARCHAR(64) PRIMARY KEY,
// firstName VARCHAR(64),
// lastName VARCHAR(64),
// dob DATE DEFAULT NULL,
// sexAtBirth CHAR(1) DEFAULT ''




 ?>