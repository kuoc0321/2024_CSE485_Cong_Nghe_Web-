<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        nav ul{
            padding : 5px;
            display: flex;
            background-color: blue;
        }
        
        nav ul li{
            padding: 5px;
            position: relative;
            display: flex;
            align-items: center;
        }

        nav ul li::after{
            content: '';
            position: absolute;
            top : 50%;
            right : 0;
            width: 1px;
            height: 70%;
            background-color: white;
            transform: translateY(-50%);

        }

        nav ul li a {
            color : white;
            text-decoration: none;
        }

        nav ul li i{
            color : white;
                  
        }

        nav ul li a:hover{
            background-color: greenyellow;
        }
    </style>
</head>
<body>

<?php
    $navItems = [
        "GIỚI THIỆU",
        "TIN TỨC & THÔNG BÁO",
        "TUYỂN SINH",
        "ĐÀO TẠO",
        "NGHIÊN CỨU",
        "ĐỐI NGOẠI",
        "VĂN BẢN",
        "SINH VIÊN",
        "LIÊN HỆ"
    ];
    $firstItemIcon = "fas fa-home";
?>
    <nav>
        <ul>
            <li><i class="<?php echo $firstItemIcon ?>"></i><a href="Home"><?php  echo $navItems[0];?></a></li>
            <?php foreach($navItems as $Item):?>
                <li><a href=""><?php echo $Item ;?></a></li>
            <?php endforeach; ?>

        </ul>
    </nav>
</body>
</html>

