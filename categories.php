<?php
include "conncet.php";

$sql = "INSERT INTO categories(id, name, slug, parent)
        VALUES (?,?,?,?)";

$stmt = $conn->prepare($sql);

$conn->set_charset("utf8");

$id = null;
$name = "HEHEH";
$slug = "ssssssss";
$parent = 0;

$stmt->bind_param("issi",$id, $name, $slug, $parent);

if($stmt->execute()){
    echo "Data successfully!";
}else{
    echo "Error!";
}

$stmt->close();
$conn->close();


?>