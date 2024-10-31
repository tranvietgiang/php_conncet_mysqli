<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        color: #333;
    }

    img {
        height: 17px;
        width: 17px;
        object-fit: cover;
        cursor: pointer;
        display: block;
        margin-top: -60px;
        margin-left: 770px;
    }

    section {
        text-align: center;
        margin-top: 50px;
    }

    input {
        border: 1px solid #000;
        outline: none;
        transition: border 0.25s linear;
        margin: 5px 0 10px 0;
        width: 200px;
        height: 30px;
    }

    input:focus {
        border: 1px solid greenyellow;
    }
    </style>
</head>

<body>
    <section>
        <form method="post">
            <input type="text" placeholder="MSSV" value="" name="mssv" autocomplete="off"><br>
            <input type="password" autocomplete="off" placeholder="Password" name="password" id="pwd"><br>
            <button type="submit" name="login">Login</button>
        </form>
        <div><img id="chk_2" src="https://cdn-icons-png.flaticon.com/128/10812/10812267.png" alt=""></div>
    </section>
    <script>
    const pwd = document.getElementById('pwd');
    const chk_2 = document.getElementById('chk_2');
    chk_2.addEventListener("click", function() {
        if (pwd.type === 'password') {
            pwd.type = "text";
            chk_2.src = "https://cdn-icons-png.flaticon.com/128/159/159604.png";
        } else {
            pwd.type = "password";
            chk_2.src = "https://cdn-icons-png.flaticon.com/128/10812/10812267.png";
        }
    });
    </script>
</body>
<?php
include "connect.php"; // Đảm bảo file này có kết nối đúng

//! rút kinh nghiệm sâu sắc là dùng hàm sha2(?,256) nhưng để trong sql có 50 thì làm sao mà kiểm tra 2 cái trùng dc
if (isset($_POST['login'])) {
    $username = $_POST['mssv'];
    $password = hash("sha256", $_POST['password']); // Mã hóa mật khẩu người dùng nhập

    // Chuẩn bị truy vấn kiểm tra đăng nhập
    $stmt = $conn->prepare("SELECT * FROM tb_login WHERE MSSV = ? AND PASSWORD = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra kết quả truy vấn
    if ($result->num_rows > 0) {
        $_SESSION['mssv'] = $username;
        header("location: admin.php");
    } else {
        echo "<p>Tên đăng nhập hoặc mật khẩu không đúng!</p>";
    }

    $stmt->close(); // Đóng câu lệnh
}

$conn->close(); // Đóng kết nối
?>

</html>