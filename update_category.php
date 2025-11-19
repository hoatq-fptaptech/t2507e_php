<?php 
// nhận data từ form
$id = $_POST["id"];
$name = $_POST["name"];
$slug = $_POST["slug"];
// tạo thành sql và lưu vào db
 // các thông số
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "t2507e";
    // b1. kết nối db
    $conn = new mysqli($host,$user,$pwd,$db);
    if($conn->connect_error){
        die("Connect database fail!");
    }

    $sql = "update categories set name='$name', slug='$slug' where id=$id";
    $conn->query($sql);
    // sau khi lưu vào db xong thì chuyển về trang danh sách
    header("Location: /categories.php");

