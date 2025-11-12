<?php 
// code php here
// variable - datatype
$x;
$x = 10; // number
$x = "Hello";
$y = 20;
if($y > 10){
    // A
}elseif($y > 5){
    // B
}elseif($y > 0){
    // C
}else{
    // D
}

for($i=0;$i<10;$i++){

}

$arr = [];
$arr[] = 1;
$arr[] = "hello";
$arr[] = true;

$student = [];
$student["name"] = "Bùi Như Lạc";
$student["age"] = 19;
$student["address"] = "13b Trịnh Văn Bô";

echo $student["name"]."-".$student["age"];

$product = [
    "name"=>"Iphone 17 promax 2TB",
    "price"=>2100,
    "qty"=>10
];
echo $product["name"]."-".$product["price"];

foreach($arr as $item){
    echo $item; // arr[i]
}

foreach($product as $key=>$item){
    echo $key."=".$item;
}

function total($a,$b){
    echo $a+$b;
   // return $a+b;
}

total(5,7);