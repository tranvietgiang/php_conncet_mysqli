<?php 
include "connect.php";

try {
    $conn->set_charset("utf8");
    echo "<div style='color: red;'>Truy vấn đến bảng usename</div>";
    
    $sql_usename = "SELECT * FROM usename"; // Kiểm tra tên bảng
    $result_usename = mysqli_query($conn, $sql_usename);
    
    if (mysqli_num_rows($result_usename) > 0) {
        while ($row = mysqli_fetch_assoc($result_usename)) {
            echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
        }
    } else {
        echo "0 kết quả!";
    }
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage(); // Xử lý lỗi và in thông báo
}



echo "<br>";

try{


echo "<div style='color:red;'>Truy vấn đến bảng categories</div>";
$sql_categories = "SELECT * FROM categories";
$result_categories = mysqli_query($conn, $sql_categories);

if(mysqli_num_rows($result_categories) > 0){
    while($row = mysqli_fetch_assoc($result_categories)){
        echo "id: ".$row['id'] . " name: " .$row['name'] . " slug:"
        .$row['slug'] . " parent: " .$row['parent'] . "<br>";
    }
}else{
    echo "yet have row?";
}
}catch(Exception $e){
    echo "error! ".$e;
}



echo "<br>";

echo "<div style='color:red;'>Truy vấn đến bảng items</div>";

$sql_items = "SELECT * FROM items";
$result_items = mysqli_query($conn, $sql_items);

if(mysqli_num_rows($result_items) > 0){
    while($row = mysqli_fetch_assoc($result_items)){
        echo "id: " .$row['id'] . " title: ".$row['title']. " excerpt".$row['excerpt'].
        " content: ".$row['content']." image".$row['image']." category".$row['category'].
        " featured: ".$row['featured']." views: ".$row['views']."created_at".$row['created_at'].
        " updated_at: ".$row['updated_at']." author: ".$row['author'];
    }
}else{
    echo "yet have row!";
}



// đóng connect
mysqli_close($conn);

?>