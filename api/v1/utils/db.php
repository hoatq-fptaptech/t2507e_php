<?php 
$conn = null;
function connect(){
    global $conn;
    if(!$conn){
        $host = "localhost";
        $user = "root";
        $pwd = "root";
        $db = "t2507e";
        // b1. kết nối db
        $conn = new mysqli($host,$user,$pwd,$db);
        if($conn->connect_error){
            die("Connect database fail!");
        }
    }
    return $conn;
}
function query($sql){ // SELECT * FROM ...
    $conn = connect();
    $rs = $conn->query($sql);
    $data = [];
    while($row = $rs->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
}
