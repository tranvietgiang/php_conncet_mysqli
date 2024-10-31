<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
#menu {
    position: relative;
}

#menu ul {
    position: absolute;
    display: flex;
    justify-content: center;
    justify-content: space-between;
    gap: 50px;
}

a {
    text-decoration: none;
}

li {
    list-style: none;
}

ul li>a {
    position: relative;
    color: #000;
}

ul li>a::after {
    position: absolute;
    content: "";
    left: 0;
    bottom: -3px;
    height: 2px;
    width: 0;
    color: #95a5a6;
    background-color: teal;
    transition: width 0.25s linear;
}

ul li>a:hover::after {
    width: 100%;
}

#img {
    border: 3px solid #95a5a6;
    border-radius: 5px;
    object-fit: cover;
    width: 50px;
    height: 50px;
}

#menu>ul>li:last-child {
    margin-left: 700px;
    margin-top: -10px;
}
</style>
<section>
    <div id="menu">
        <ul>
            <li><a href="#">Javascript</a></li>
            <li><a href="#">php</a></li>
            <li><a href="#">html</a></li>
            <li><a href="#">css</a></li>
            <li><a href="#">reacjs</a></li>
            <li><a href=""><img id="img" src="image/user.png" alt=""></a>
                <span><br><b>Name: <?php echo $_SESSION['mssv']?> </b></span>
            </li>
        </ul>
    </div>
</section>

<body>

</body>

</html>