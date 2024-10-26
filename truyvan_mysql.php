<?php 
// include "conncet.php";

// // Truy vấn dữ liệu
// $sql = "SELECT * FROM usename"; // Kiểm tra tên bảng
// $stmt = $conn->prepare($sql);

// $stmt->execute();
// $result = $stmt->get_result(); // Lấy kết quả từ câu lệnh đã thực thi

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) { // Sử dụng fetch_assoc() từ kết quả
//         echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
//     }
// } else {
//     echo "0 kết quả!";
// }

//------------------------------------------------------------------------------

// mysqli_query():
// Chức năng: Thực thi một câu lệnh SQL (như SELECT, INSERT, UPDATE, DELETE) trên cơ sở dữ liệu.

// mysqli_fetch_assoc():
// associative array: mà key của nó mà user can tự thêm!
// Chức năng: Lấy một hàng dữ liệu từ đối tượng kết quả và trả về dưới dạng mảng kết hợp (associative array).
include "conncet.php";

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