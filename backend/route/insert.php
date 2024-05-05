<?php

include_once "../controller/db_controller.php";

$insert = new Db_controller;
$call = $insert->insert($_POST);
echo json_encode($call);