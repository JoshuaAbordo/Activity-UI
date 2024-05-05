<?php

include_once "../database/database.php";

class TableUi extends Database {

    public function CreateTable(){
        $this->conn->query("CREATE TABLE IF NOT EXISTS users(
            id int primary key auto_increment,
            username varchar(25)not null,
            email varchar(25)not null UNIQUE,
            password varchar(25)not null, 
            role varchar(25)not null
        )");
    }
}
$ui = new TableUi;
$ui->CreateTable();

?>