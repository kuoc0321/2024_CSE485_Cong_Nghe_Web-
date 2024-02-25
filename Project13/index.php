<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            color: red;
            text-transform: uppercase;
        }
        .container{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        column-gap: 10px;
        row-gap: 10px;

        }
        .course {
        padding: 10px;
        margin-bottom: 20px;
        }
        .course h3 {
        text-transform: uppercase;
        
        }
        .course p {
        margin-top: 5px;  
        }

        .course img{
        width: 100%;
        height: 100%;
        }
    </style>
</head>
<body>
    <h2>KHÓA HỌC SẮP KHAI GIẢNG</h2>
    <?php 
        $courses =[
        [
            'title' => 'Học lập trình quốc tế',
            'description'=> 'Chương trình đào tạo chính thức tại Việt Nam từ
            Aptech Global. Phát triển nghề nghiệp sinh viên IT như một lập trình viên
            quốc tế.',
            'fee'=> '15.000.000 VNĐ',
            'start_date'=> '2/2/24',
            'duration'=> '2- 2.5 năm ',
            'image'=> 'pic.png'
        ],
        [
            'title' => 'Lập trình viên web fullstack',
            'description' => 'Khóa học phù hợp với người bắt đầu lập trình hoặc người
            chuyển nghề. Trang bị từ frontend đến backend, xây dựng 
            website hoàn chỉnh sau khóa học.Khóa học phù hợp với người bắt đầu lập trình hoặc người
            chuyển nghề. ',
            'fee' => 'Ưu đãi giảm 15% học phí','start_date' => '2/2/24',
            'duration' => '6 tháng',
            'image' => 'pic.png'
        ],
        [
            'title' => 'Lập trình viên java fullstack',
            'description' => 'Phát triển ứng dụng web từ cơ bản đến nâng cao bằng 
            Java, các ứng dụng doanh nghiệp sử dụng J2EE,Servlet,
            JSP,Spring Framework,EJB,...',
            'fee' => 'Ưu đãi giảm 15% học phí','start_date' => '2/2/24',
            'duration' => '236 giờ',
            'image' => 'pic.png'
        ],
        [
            'title' => 'Lập trình php & laravel',
            'description' => 'PHP là một trong các ngôn ngữ thiết kế web mạnh nhất.
            Khóa học trang bị kỹ năng xây dựng web hoàn chỉn sử dụng php kết hợp Laravel Framework.',
            'fee' => '9.600.000 VNĐ','start_date' => '5/2/24',
            'duration' => '36 giờ',
            'image' => 'pic.png'
        ],
        [
            'title' => 'khóa học lập trình .net',
            'description' => 'Phát triển ứng dụng nền tảng ASP.NET Core MVC. Để học tốt khóa học
            yêu cầu học viên đã có kiến thức C# và Frontend.',
            'fee' => '6.000.000 VNĐ','start_date' => '2/2/24',
            'duration' => '40 giờ',
            'image' => 'pic.png'
        ],
        [
            'title' => 'Lập trình sql server',
            'description' => 'Trang bị những kiến thức nền tảng vững chắc về SQL Server
            như các kỹ thuật lọc dữ liệu, phân tích, thiết kế và quản trị cơ sở dữ liệu,..',
            'fee' => '4.500.000 VNĐ','start_date' => '2/2/24',
            'duration' => '30 giờ',
            'image' => 'pic.png'
        ]
    ];

    echo '<div class="container">';
    foreach ($courses as $course) {
      echo '<div class="course">';
      echo '<div >';
      echo '<img class="picture" src="./image/pic.png"' . $course['title'] . '">';
      echo '</div>';
      echo '<h3>' . $course['title'] . '</h3>';
   
      echo '<p>' . $course['description'] . '</p>';
      
      echo '<p>Học phí: ' . $course['fee'] . '</p>';
      echo '<p>Khải giảng: ' . $course['start_date'] . '</p>';
      echo '<p>Thời lượng: ' . $course['duration'] . '</p>';
    
      echo '</div>';
    }
    echo '</div>';
    ?>
    <!-- echo '<img src= "./image/pic.png"'; -->
</body>
</html>