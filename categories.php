<?php
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
    // b2. query data
    $sql = "select * from categories";
    $rs = $conn->query($sql);
    // b3. get result (data)
    $data = [];
    if($rs->num_rows > 0){
        while($row=$rs->fetch_assoc()){
            $data[] = $row;
        }
    }
    // var_dump($data);die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <?php include("html/style.php");?>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("html/aside.php");?>
                <main class="col">
                    <h1>Category</h1>
                    <a href="#"class="btn btn-outline-primary">Create a category</a>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $item):?>
                            <tr>
                                <th scope="row"><?php echo $item["id"]; ?></th>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo $item["slug"]; ?></td>
                                <td>
                                    <a href="#"class="btn btn-outline-info">Edit</a>
                                    <a href="#"class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        </table>
                </main>
            </div>
        </div>
    </section>
</body>
</html>