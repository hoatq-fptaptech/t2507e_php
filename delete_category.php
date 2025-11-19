<?php 
 // lấy được giá trị id (tham số trên url)
$id = $_GET["id"];
// lấy dữ liệu từ db theo id đã lấy ở trên, để cho vào form dưới
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
$sql = "delete from categories where id = $id ";
$rs = $conn->query($sql);
header("Location: /categories.php");