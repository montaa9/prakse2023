<?php
include_once 'connection.php';
// no 2-10 rindiņai apstrādā saņemtos datus.
// 

// get the raw POST data
$rawData = file_get_contents("php://input");

// pārvēršam no json formāta uz php objektu
$data = json_decode($rawData);

$email = $data->email;
//izveido tukšu objektu, tajā uzkrāj datus un sūta atpakaļ
$dataObj = (object)[];

// Pārbaudam e-pastu...
$query = "SELECT user_id FROM users WHERE email = '$email' limit 1 ";
  if ($result = mysqli_query($conn, $query)) {
    if (mysqli_num_rows($result) > 0 ) {
        $dataObj->emailExists = true;
    } else {
        $dataObj->emailExists = false;
    }
  } else {
    $dataObj->emailExists = false;
  }
  

echo json_encode($dataObj); //objektu sapako atkaļ kā json un padod atpakaļ uz frontend
