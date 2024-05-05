<?php

include_once "../controller/db_controller.php";
header('Content-Type: application/json');
$list = new Db_controller;
$show = $list->list();
echo json_encode($show);