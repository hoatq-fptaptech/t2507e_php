<?php 
$product = [
    "name"=>"Iphone 17 promax 2TB",
    "price"=>2100,
    "qty"=>10
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <?php include("html/style.php");?>
</head>
<body>
    <section>
        <div class="container">
            <h1><?php echo $product["name"];?></h1>
            <img width="150" src="images/(600x600)_iphone_17_pro_max_orange_thumb_didongmy.jpg"/>
            <p>$<?php echo $product["price"];?></p>
            <?php if($product['qty']> 0):?>
            <p class="text-success">Còn hàng</p>
            <?php else:?>
            <p class="text-danger">Hết hàng</p>
            <?php endif;?>
            <?php foreach([] as $item):?>

            <?php endforeach;?>    
        </div>
    </section>
    <script type="text/javascript">
        
    </script>
</body>
</html>