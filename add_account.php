<?php
include "conncet.php";

// Kiểm tra kết nối cơ sở dữ liệu
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Chuẩn bị câu lệnh SQL
$sql = "INSERT INTO tb_login (MSSV, PASSWORD, email) VALUES (?, SHA2(?, 256), ?)";
$stmt = $conn->prepare($sql);

$conn->set_charset("utf8");

$mssv = "G13"; 
$pass = "123"; 
$email = "tranvietgiang25@gmail.com";

// Liên kết các tham số
$stmt->bind_param("sss", $mssv, $pass, $email);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "existed!";
}

// Đóng câu lệnh và kết nối
$stmt->close();
$conn->close();
?>