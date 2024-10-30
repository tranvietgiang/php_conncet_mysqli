<?php
include "connect.php"; 


// Câu lệnh SQL để chèn dữ liệu
$sql = "INSERT INTO items (id, title, excerpt, content, image, category, featured, views, created_at, updated_at, author) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$conn->set_charset("utf8");

// Dữ liệu bạn muốn chèn
$id = 25;
$title = 'Tiêu đề';
$excerpt = 'Mô tả ngắn';
$content = 'Nội dung chi tiết';
$image = 'link_hình_ảnh';
$category = 10;
$featured = 1;
$views = 10;
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$author = 1;

// Gán các tham số cho câu lệnh
$stmt->bind_param("issssiiisss", $id, $title, $excerpt, $content, $image, $category, $featured, $views, $created_at, $updated_at, $author);

// issssiiisss
// i: Integer (số nguyên)
// s: String (chuỗi)
// Vậy trong chuỗi "issssiiisss":

// Tham số đầu tiên ($id) là một số nguyên (i).
// Các tham số tiếp theo là chuỗi (s):
// $title, $excerpt, $content, $image, $created_at, $updated_at
// Tham số thứ sáu ($category) là một số nguyên (i).
// Tham số thứ bảy ($featured) là một số nguyên (i).
// Tham số thứ tám ($views) là một số nguyên (i).
// Tham số thứ chín ($author) là một số nguyên (i).
// Thực hiện câu lệnh
if ($stmt->execute()) {
    echo "Dữ liệu đã được chèn thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

// Đóng câu lệnh và kết nối
$stmt->close();
$conn->close();
?>