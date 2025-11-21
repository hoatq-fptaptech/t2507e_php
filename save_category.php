<?php 
// nhận data từ form
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

    // xử lý upload file
    $file = $_FILES["icon"];
    $accepted = true;
    // kiểm tra đảm bảo phải là loại ảnh cho phép
    if(getimagesize($file["tmp_name"])=== false){
        // ko phải ảnh
        $accepted = false;
        // echo "Vui lòng tải file ảnh!";
    }
    // kiểm tra đuôi file
    $allowTypes = ["jpg","jpeg","png","gif"];
    $extFile = pathinfo($file["name"],PATHINFO_EXTENSION);
    $extFile = strtolower($extFile);// chuyển thành chữ in thường
    if(!in_array($extFile,$allowTypes)){
        $accepted = false;
        // echo "Vui lòng tải file ảnh có định dạng png jpg jpeg gif!";
    }
    // giới hạn dung lượng 5MB
    if($file["size"] > 5 * 1024 * 1024){
        $accepted = false;
    }
    // tạo tên file là string ngẫu nhiên
    $fileName = bin2hex(random_bytes(16)).".".$extFile;
    
    if($accepted){
        // tạo thư mục lưu ảnh
        $year = date("Y");
        $month = date("m");
        $path = "uploads/$year/$month/";
        if(!is_dir($path)){
            mkdir($path,777,true);
        }
        $targetFile = $path.$fileName;
        move_uploaded_file($file["tmp_name"],$targetFile);
    }else{
        die("Upload file không đúng yêu cầu");
    }
    // end upload

    $sql = "insert into categories(name,slug,icon) values('$name','$slug','$targetFile');";
    $conn->query($sql);
    // sau khi lưu vào db xong thì chuyển về trang danh sách
    header("Location: /categories.php");

