<?php
include "connect.php"; 

$sql = "INSERT INTO usename(id, name)
        VALUES (?, ?)";

$stmt = $conn->prepare($sql);

$conn->set_charset("utf8");

$id = 223;
$name = "Tran Viet Giang";

$stmt->bind_param("is",$id,$name);


if($stmt->execute()){
echo "Data successfully!";
}

$stmt->close();
$conn->close();
?>