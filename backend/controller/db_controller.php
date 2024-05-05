<?php

include_once "../database/database.php";

class Db_controller extends Database {

    public function insert(array $params){
        $arr = ['username', 'email', 'password', 'role'];

        foreach($arr as $key){
            if(empty($params[$key])){
                return json_encode(['message' => "{$key} is Required"]);
            }
        }
        $username = $params['username'];
        $email = $params['email'];
        $password = $params['password'];
        $role = $params['role'];

        $stmt = $this->conn->prepare("INSERT INTO users(username,email,password,role)values(?,?,?,?)");
        $stmt->bind_param('ssss', $username, $email, $password, $role);
        $isinsert = $stmt->execute();

        if($isinsert){
            return json_encode(['message' => 'User Successfully Enter']);
        }
    }

    public function list(){
        $list = $this->conn->query("SELECT * FROM users");

        if($list->num_rows>0){
            return $list->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function search(array $params){
        if(empty($params['username'])){
            return json_encode(['message' => 'Username is Required']);
        }

        $username = $params['username'];
        $usern = "%$username%";
        $stmt = $this->conn->prepare("SELECT * FROM users where username like ?");
        $stmt->bind_param('s', $usern);

        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return json_encode(['message' => 'No Data']);
        }
    }
}