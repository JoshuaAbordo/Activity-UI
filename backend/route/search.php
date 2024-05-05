<?php

include_once "../controller/db_controller.php";
header("Content-Type: application/json");

$search = new Db_controller;
$call = $search->search($_POST);
echo json_encode($call);
