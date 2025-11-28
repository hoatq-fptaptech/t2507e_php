<?php 
require_once('utils/db.php');
require_once('utils/helpers.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=utf-8");
// Handle OPTIONS requests for preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // lấy nội dung json từ body của request
    $json_data = file_get_contents("php://input");
    // chuyeern thanhf array
    $data = json_decode($json_data,true);

    $customer_name = $data["customer_name"];
    $customer_tel = $data["customer_tel"];
    $customer_address = $data["customer_address"];
    $payment_method = $data["payment_method"];
    $paid = 0;

    $cart = $data["cart"]; // array

    $grand_total = 0;
    foreach($cart as $item){
        $grand_total += $item["price"] * $item["buy_qty"];
    }
    $now = date("Y-m-d H:i:s");
    $sql = "INSERT INTO orders(customer_name,customer_tel,
        customer_address,created_at,grand_total,payment_method,paid)
        values('$customer_name','$customer_tel','$customer_address',
        '$now',$grand_total,'$payment_method',$paid)";
    $order_id = queryUpdate($sql);  
    // thêm các dữ liệu bảng order_products
    foreach($cart as $item){
        $product_id = $item["id"];
        $buy_qty = $item["buy_qty"];
        $price = $item["price"];
        $sql_item = "INSERT INTO order_products(order_id,product_id,buy_qty,price)
                        values($order_id,$product_id,$buy_qty,$price)";
        queryUpdate($sql_item);
    }
    sendJsonResponse();
}